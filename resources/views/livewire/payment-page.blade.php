<div>
    @if ($add == true)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Add Payment</h2>
                </div>
            </div>
        </div>

        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="save">
            {{-- <div class="form-group">
                <label for="topic">
                    Payment For
                </label>
                <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic"
                    wire:model='topic'>
                    <option value="">Choose One</option>
                    <option value="organic and bio chemistry">Organic and Bio Chemistry</option>
                    <option value="analytical and enviromental chemistry">Analytical and Enviromental Chemistry</option>
                    <option value="inorganic and material chemistry">Inorganic and Material Chemistry</option>
                    <option value="physical and computation chemistry">Physical and Computation Chemistry</option>
                    <option value="chemical education">Chemical Education</option>
                </select>
                @error('topic')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
            @can('presenter')
                <div class="form-group">
                    <label for="uploadAbstractId">
                        Pay for abstract
                    </label>
                    <select class="custom-select @error('uploadAbstractId') is-invalid @enderror" id="uploadAbstractId"
                        name="uploadAbstractId" wire:model='uploadAbstractId'>
                        <option value="">Choose One</option>
                        @foreach ($abstract as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                    @error('uploadAbstractId')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endcan

            <div class="form-group">
                <label for="fee">Fee</label>
                <input disabled type="text" class="form-control @error('fee') is-invalid @enderror" id="fee"
                    name="fee" value="{{ $fee }}">
                @error('fee')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input disabled type="text" class="form-control @error('discount') is-invalid @enderror"
                    id="discount" placeholder="Title" name="discount" value='{{ $discount }}'>
                @error('discount')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="fee_after_discount">Fee after discount</label>
                <input disabled type="text" class="form-control @error('fee_after_discount') is-invalid @enderror"
                    id="fee_after_discount" placeholder="Title" name="fee_after_discount"
                    value='{{ $fee_after_discount }}'>
                @error('fee_after_discount')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="total_bill">Total Bill</label>
                <input type="text" class="form-control @error('total_bill') is-invalid @enderror" id="total_bill"
                    name="total_bill" wire:model='total_bill'>
                @error('total_bill')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="proof_of_payment">Proof of Payment</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" accept=".jpg,.png,.jpeg,.gif,.svg"
                            class="custom-file-input @error('proof_of_payment') is-invalid @enderror"
                            id="proof_of_payment" wire:model='proof_of_payment'>
                        <label class="custom-file-label" for="proof_of_payment">
                            {{ $proof_of_payment == null ? 'Choose' : $proof_of_payment->getClientOriginalName() }}
                        </label>
                    </div>
                </div>
                @error('proof_of_payment')
                    <span style="font-size:12px; color:red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>
    @else
        @can('presenter')
            @if (count($abstract) == 0)
                <button class="btn btn-primary" disabled>Add Payment</button>
                <br>
                <span><strong>Sorry, you do not yet have an accepted abstract !</strong></span>
            @else
                <button class="btn btn-primary" wire:click="add()">Add Payment</button>
            @endif
        @endcan
        @can('participant')
            <button class="btn btn-primary" wire:click="add()">Add Payment</button>
        @endcan
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (count($payments) !== 0)

            <h4 class="mt-5">Your Payment</h4>
            <table class="table my-3">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Bill</th>
                        @can('presenter')
                            <th scope="col">Payment for abstract</th>
                        @endcan
                        <th scope="col">Status Validation</th>
                        <th>Receipt</th>
                        <th scope="col">Validated By</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $a = 0;
                    @endphp
                    @foreach ($payments as $item)
                        <tr>
                            <td scope="row">{{ ++$a }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->total_bill }}</td>
                            @can('presenter')
                                <td>{{ $item->uploadAbstract->title }}</td>
                            @endcan
                            <td>{{ $item->validation }}</td>
                            <td>
                                @if ($item->receipt)
                                    <a href="{{ asset('uploads/' . $item->receipt) }}" target="_blank"
                                        style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                            aria-hidden="true"></i>
                                    </a>
                                @endif
                            </td>
                            <td>{{ $item->validated_by }}</td>
                            {{-- <td> --}}
                            {{-- @if ($item->status == 'not yet reviewed')
                                    <button class="btn btn-info"
                                        wire:click='editAbstract({{ $item->id }})'>edit</button>
                                @else
                                    <p>No actions</p>
                                @endif --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <h4 class="mt-5">Fee</h4>
        <table class="table my-3">

            @foreach ($fee_information as $fee)
                <tr>
                    <td colspan="4" class="bg-dark text-white" align="center">{{ $fee['dates'] }}</td>
                </tr>
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Online/Offline</th>
                        <th scope="col">Fee</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fee['data'][0] as $i)
                        <tr>
                            <td>{{ $i->name }}</td>
                            <td>{{ $i->attendance }}</td>
                            <td>IDR. {{ $i->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            @endforeach
        </table>


        <h4 class="mt-5">Payment</h4>
        <table class="table my-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Account Number</th>
                    <th scope="col">Account Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $bank_name }}</td>
                    <td>{{ $payment_number }}</td>
                    <td>{{ $recipient }}</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
