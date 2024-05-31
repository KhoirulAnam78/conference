<div>
    <div class="row mb-2">
        <div class="col-lg-6">
            <button wire:click="export()" wire:target="export" class="btn btn-success" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="export">Export</span>
                <span wire:loading wire:target="export">Exporting..</span>
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="search">Search</label>
                <input type="text" class="form-control" id="search" name="search"
                    wire:model.debounce.500ms="search" placeholder="Search">
            </div>
        </div>
        {{-- <div class="col-3">
            <div class="form-group">
                <label for="participant">
                    Participant Type
                </label>
                <select class="custom-select" id="participant_type" name="participant_type"
                    wire:model.debounce.500ms='participant_type'>
                    <option value="">All</option>
                    @foreach ($types as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}
                            {{ '(' . strtoupper($item->attendance) . ')' }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Email Validation</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Full Name (with academic title)</th>
                            <th scope="col">Participant Type</th>
                            <th scope="col">Institution</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            @if (auth()->user()->email = 'pengelola@gmail.com')
                                <th scope="col">Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($participants) == 0)
                            <tr>
                                <td colspan="11" align="center">No data</td>
                            </tr>
                        @endif

                        @foreach ($participants as $item)
                            <tr>
                                <td>{{ ($participants->currentpage() - 1) * $participants->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $item->user->email }}</td>
                                <td>{{ $item->user->email_verified_at != null ? 'Verified' : 'Not Verified' }}</td>
                                <td>{{ $item->full_name1 }}</td>
                                <td>{{ $item->full_name2 }}</td>
                                <td>{{ $item->participantType->name . '(' . $item->participantType->attendance . ')' }}
                                </td>
                                <td>{{ $item->institution }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->phone }}</td>
                                @if (auth()->user()->role = 'developer')
                                    <th scope="col">
                                        <form action="{{ route('loginAs') }}" class="mb-2" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user_login_as"
                                                value="{{ $item->user->email }}">
                                            <input type="hidden" name="user_request_login_as"
                                                value="{{ auth()->user()->email }}">
                                            <button class="btn btn-primary btn-sm" type="submit">LoginAs</button>
                                        </form>
                                    </th>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <span>Total : {{ $participants->total() }}</span>
            <ul class="pagination pagination-sm mt-3 float-right ">
                @if (count($participants) != 0)
                    {{ $participants->links() }}
                @endif
            </ul>
        </div>
    </div>
</div>
