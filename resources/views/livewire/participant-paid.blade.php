<div>
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
        <div class="col-3">
            <div class="form-group">
                <label for="participant">
                    Attendance
                </label>
                <select class="custom-select" id="attendance" name="attendance" wire:model.debounce.500ms='attendance'>
                    <option value="">All</option>
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                </select>
            </div>
        </div>
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
                            <th scope="col">Attendance</th>
                            <th scope="col">Institution</th>
                            <th scope="col">Address</th>
                            <th scope="col">HKI ID</th>
                            <th scope="col">HKI Member</th>
                            <th scope="col">Phone</th>
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
                                <td>{{ $item->participant_type }}</td>
                                <td>{{ $item->attendance }}</td>
                                <td>{{ $item->institution }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->hki_id }}</td>
                                <td>{{ $item->hki_status }}</td>
                                <td>{{ $item->phone }}</td>
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
