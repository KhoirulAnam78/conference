<div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="search2">Search</label>
                <input type="text" class="form-control" id="search2" name="search2" wire:model.debounce.500ms="search2"
                    placeholder="Search by full name">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="participant">
                    Filter HKI Member Status
                </label>
                <select class="custom-select" id="search" name="search" wire:model='search'>
                    <option value="">All</option>
                    <option value="valid">Validated</option>
                    <option value="not yet validated">Not yet validated</option>
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="search">Filter Status HKI Member</label>
                <select name="search" id="search" wire:model='search' class="form-control">

                </select>
            </div> --}}
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
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">HKI ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Validated By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($participants) == 0)
                            <tr>
                                <td colspan="7" align="center">No data</td>
                            </tr>
                        @endif
                        @foreach ($participants as $item)
                            <tr>
                                <td>{{ ($participants->currentpage() - 1) * $participants->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->full_name1 }}</td>
                                <td>{{ $item->hki_id }}</td>
                                <td>{{ $item->hki_status }}</td>
                                <td>{{ $item->hki_validated_by }}</td>
                                <td><button class="btn btn-primary"
                                        wire:click="showValidate('{{ $item->id }}')">Validate</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination pagination-sm mt-3 float-right ">
                @if (count($participants) != 0)
                    {{ $participants->links() }}
                @endif
            </ul>
        </div>
    </div>

    <div class="modal fade" id="modalValidate" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Validate HKI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="empty()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="full_name1">Full Name</label>
                                <input type="text" disabled
                                    class="form-control @error('full_name1') is-invalid @enderror" id="full_name1"
                                    name="full_name1" wire:model="full_name1" placeholder="judul">
                                @error('full_name1')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="hki_id">HKI ID</label>
                                <input type="text" disabled
                                    class="form-control @error('hki_id') is-invalid @enderror" id="hki_id"
                                    name="hki_id" wire:model="hki_id" placeholder="judul">
                                @error('hki_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="form-group">
                                <label for="">Member Card HKI :</label>
                                <div class="row mx-3 card">
                                    @if ($member_card)
                                        <img src="{{ asset('uploads/' . $member_card) }}" style="max-width:100%">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="invalid()" class="btn btn-danger" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="invalid">Invalid</span>
                        <span wire:loading wire:target="invalid">Validating..</span>
                    </button>
                    <button wire:click="valid()" class="btn btn-primary" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="valid">Valid</span>
                        <span wire:loading wire:target="valid">Validating..</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="empty()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

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
