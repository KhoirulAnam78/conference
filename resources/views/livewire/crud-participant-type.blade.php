<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalParticipantType">Tambah Participant
        Type</span>
    <div class="row justify-content-center mb-3">
        <h4>Daftar Participant Type</h4>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Attendance</th>
                            <th scope="col">Price</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($data) == 0)
                            <tr>
                                <td colspan="7" align="center">No data</td>
                            </tr>
                        @endif

                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->attendance }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->start_date }}</td>
                                <td>{{ $item->end_date }}</td>
                                <td><button class="btn btn-primary"
                                        wire:click="hapus('{{ $item->id }}')">Hapus</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($data as $item)
                    <li class="list-group-item">{{ $item->name }} <span class="btn btn-danger"
                            wire:click="hapus({{ $item->id }})">Hapus</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <div class="modal fade" wire:ignore.self id="modalParticipantType" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Participant Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Participant Type</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>


                    <div class="form-group">
                        <label for="attendance">Attendance</label>
                        <select class="form-control" name="attendance" id="attendance"wire:model="attendance">
                            <option value="">Pilih</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                        @error('attendance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price (Rp)</label>
                        <input type="number" name="price" class="form-control" id="price" rows="5"
                            min="0" step="10000" wire:model="price"></input>
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" class="form-control" id="start_date" rows="5"
                            wire:model="start_date"></input>
                        @error('start_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="end_date" rows="5"
                            wire:model="end_date"></input>
                        @error('end_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Tambah</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('alert', function(e) {
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: "success"
            });
        })
    </script>
@endpush
