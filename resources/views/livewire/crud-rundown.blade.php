<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddRundown">Tambah Rundown</span>
    <div class="row justify-content-center mb-3">
        <h4>Rundown Event</h4>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Date</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Event</th>
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
                                <td>
                                    {{ $item->date }}
                                </td>
                                <td>
                                    <ul class="list-group">
                                        @foreach ($item->detailRundown as $dr)
                                            <li class="list-group-item">{{ $dr->event }}
                                                <br>
                                                <i class="fa fa-user"></i>
                                                {{ $dr->organizer }}
                                                <br>
                                                <i class="fa fa-map-marker"></i>
                                                {{ $dr->place }}
                                                <br>
                                                <i class="fa fa-clock-o"></i>
                                                {{ $dr->start_time }} -
                                                {{ $dr->end_time }}
                                                <br>
                                                <button class="btn btn-danger mx-1"
                                                    wire:click="hapus_detail('{{ $dr->id }}')">Hapus</button>
                                                <button class="btn btn-warning mx-1" data-toggle="modal"
                                                    data-target="#modal_edit"
                                                    wire:click="edit_detail('{{ $dr->id }}')">Edit</button>

                                            </li>
                                        @endforeach
                                    </ul>
                                    <br>
                                    <div class="d-flex justify-content-end">

                                        <button class="btn btn-info" wire:click="tambah('{{ $item->id }}')">Tambah
                                            Acara</button>
                                    </div>
                                </td>

                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-warning mx-1" data-toggle="modal"
                                            data-target="#modalEditRundown"
                                            wire:click="edit_hari('{{ $item->id }}')">Edit Hari</button>

                                        <button class="btn btn-danger mx-1"
                                            wire:click="hapus_acara('{{ $item->id }}')">Hapus Hari</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" wire:ignore.self id="modalAddRundown" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Rundown</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" rows="5"
                            wire:model="date"></input>
                        @error('date')
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

    <div class="modal fade" wire:ignore.self id="modalEditRundown" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Rundown</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">New Nama</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="date">New Date</label>
                        <input type="date" name="date" class="form-control" id="date" rows="5"
                            wire:model="date"></input>
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update_hari"
                        wire:loading.attr="disabled" wire:target="update_hari">
                        <span wire:loading.remove wire:target="update_hari">Simpan</span>
                        <span wire:loading wire:target="update_hari">Simpan...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="modal-tambah" tabindex="-1" wire:ignore.self aria-labelledby="modal-tambah"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Tambah Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="event">Nama Event</label>
                        <input type="text" name="event" class="form-control" id="event" rows="5"
                            wire:model="event"></input>
                        @error('event')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="organizer">Pelaksana</label>
                        <input type="text" name="organizer" class="form-control" id="organizer" rows="5"
                            wire:model="organizer"></input>
                        @error('organizer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="start_time">Waktu Mulai</label>
                        <input type="time" name="start_time" class="form-control" id="start_time" rows="5"
                            wire:model="start_time"></input>
                        @error('start_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="end_time">Waktu Selesai</label>
                        <input type="time" name="end_time" class="form-control" id="end_time" rows="5"
                            wire:model="end_time"></input>
                        @error('end_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>


                    <div class="form-group">
                        <label for="place">Tempat</label>
                        <input type="text" name="place" class="form-control" id="place" rows="5"
                            wire:model="place"></input>
                        @error('place')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="input_detail"
                        wire:loading.attr="disabled" wire:target="input_detail">
                        <span wire:loading.remove wire:target="input_detail">Simpan</span>
                        <span wire:loading wire:target="input_detail">Simpan...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-edit" tabindex="-1" wire:ignore.self aria-labelledby="modal-edit"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="event">Nama Event baru</label>
                        <input type="text" name="event" class="form-control" id="event" rows="5"
                            wire:model="event"></input>
                        @error('event')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="organizer">Pelaksana</label>
                        <input type="text" name="organizer" class="form-control" id="organizer" rows="5"
                            wire:model="organizer"></input>
                        @error('organizer')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="start_time">Waktu Mulai</label>
                        <input type="time" name="start_time" class="form-control" id="start_time" rows="5"
                            wire:model="start_time"></input>
                        @error('start_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="end_time">Waktu Selesai</label>
                        <input type="time" name="end_time" class="form-control" id="end_time" rows="5"
                            wire:model="end_time"></input>
                        @error('end_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>


                    <div class="form-group">
                        <label for="place">Tempat</label>
                        <input type="text" name="place" class="form-control" id="place" rows="5"
                            wire:model="place"></input>
                        @error('place')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update_detail"
                        wire:loading.attr="disabled" wire:target="update_detail">
                        <span wire:loading.remove wire:target="update_detail">Simpan</span>
                        <span wire:loading wire:target="update_detail">Simpan...</span>
                    </button>
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
        document.addEventListener('show-tambah', function(e) {
            $('#modal-tambah').modal('show');
        })
        document.addEventListener('show-edit', function(e) {
            $('#modal-edit').modal('show');
        })
        document.addEventListener('show-edit-rundown', function(e) {
            $('#modalEditRundown').modal('show');
        })
    </script>
@endpush
