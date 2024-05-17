<div>

    @if ($validation == false)
        <div class="row mb-2">
            <div class="col-lg-6">
                <button wire:click="export()" class="btn btn-success" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="export">Export</span>
                    <span wire:loading wire:target="export">Exporting..</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="search2">Search</label>
                    <input type="text" class="form-control" id="search2" name="search2"
                        wire:model.debounce.500ms="search2" placeholder="Search by full name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="participant">
                        Filter Payment Status
                    </label>
                    <select class="custom-select" id="search" name="search" wire:model.debounce.500ms='search'>
                        <option value="">All</option>
                        <option value="valid">Validated</option>
                        <option value="not yet validated">Not yet validated</option>
                    </select>
                </div>
            </div>

        </div>
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Email</th>
                                <th>Full Name</th>
                                <th>Presenter</th>
                                <th scope="col">Total Bill</th>
                                <th scope="col">Invoice For</th>
                                <th scope="col">Status</th>
                                <th scope="col">Validated By</th>
                                <th>Receipt</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($payments) == 0)
                                <tr>
                                    <td colspan="9" align="center">No data</td>
                                </tr>
                            @endif
                            @foreach ($payments as $item)
                                <tr>
                                    <td>{{ ($payments->currentpage() - 1) * $payments->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->participant->user->email }}</td>
                                    <td>{{ $item->participant->full_name1 }}</td>
                                    <td>{{ $item->upload_abstract_id == null ? '' : $item->uploadAbstract->presenter }}
                                    </td>
                                    <td>{{ $item->total_bill }}</td>
                                    <td>{{ $item->upload_abstract_id == null ? 'participant' : $item->uploadAbstract->title }}
                                    </td>
                                    <td>{{ $item->validation }}</td>
                                    <td>{{ $item->validated_by }}</td>
                                    <td>
                                        @if ($item->receipt)
                                            <a href="{{ asset('storage/' . $item->receipt) }}" target="_blank"
                                                style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                                    aria-hidden="true"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td><button class="btn btn-primary"
                                            wire:click="showDetail('{{ $item->id }}')">Validate</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination pagination-sm mt-3 float-right ">
                    @if (count($payments) != 0)
                        {{ $payments->links() }}
                    @endif
                </ul>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <label for="full_name1">Full Name</label>
                    <input type="text" disabled class="form-control @error('full_name1') is-invalid @enderror"
                        id="full_name1" name="full_name1" wire:model.debounce.500ms="full_name1">
                    @error('full_name1')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" disabled class="form-control @error('email') is-invalid @enderror"
                        id="email" name="email" wire:model.debounce.500ms="email">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="participant_type">Participant Type</label>
                    <input type="text" disabled class="form-control @error('participant_type') is-invalid @enderror"
                        id="participant_type" name="participant_type" wire:model.debounce.500ms="participant_type">
                    @error('participant_type')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_bill">Total Bill</label>
                    <input type="text" disabled class="form-control @error('total_bill') is-invalid @enderror"
                        id="total_bill" name="total_bill" wire:model.debounce.500ms="total_bill">
                    @error('total_bill')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-7">
                <div class="form-group">
                    <label for="">Invoice :</label>
                    <div class="row mx-3 card">
                        @if ($proof_of_payment)
                            <img src="{{ asset('storage/' . $proof_of_payment) }}" style="max-width:100%">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            @if (!$receipt)
                <button wire:click="invalid()" class="btn btn-danger" wire:target="invalid"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="invalid">Invalid</span>
                    <span wire:loading wire:target="invalid">Validating..</span>
                </button>
            @endif
            <button class="btn btn-primary" wire:click='showValidate()' wire:target="showValidate"
                wire:loading.attr="disabled">Valid</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                wire:click="back()">Cancel</button>
        </div>

        <div class="modal" id="modalValidate" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Make Receipt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="full_name1">Full Name</label>
                            <input type="text" class="form-control @error('full_name1') is-invalid @enderror"
                                id="full_name1" name="full_name1" wire:model.debounce.500ms="full_name1">
                            @error('full_name1')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_receipt">Nomor Receipt</label>
                            <input type="text" class="form-control @error('no_receipt') is-invalid @enderror"
                                id="no_receipt" name="no_receipt" wire:model.debounce.500ms="no_receipt">
                            @error('no_receipt')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount Paid</label>
                            <input type="text" class="form-control @error('amount') is-invalid @enderror"
                                id="amount" name="amount" wire:model.debounce.500ms="amount">
                            @error('amount')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="for_payment_of">For the Payment Of</label>
                            <input type="text" class="form-control @error('for_payment_of') is-invalid @enderror"
                                id="for_payment_of" name="for_payment_of" wire:model.debounce.500ms="for_payment_of">
                            @error('for_payment_of')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="valid()" class="btn btn-primary" wire:target="valid()"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="valid">Valid</span>
                            <span wire:loading wire:target="valid">Validating..</span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @section('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#modalValidate').modal('hide');
            });
            window.addEventListener('show-modal', event => {
                // console.log('MASUK SINI');
                $('#modalValidate').modal('show');
            });
        </script>
    @endsection
</div>
