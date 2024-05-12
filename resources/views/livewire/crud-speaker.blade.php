<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddSpeaker">Tambah Speaker</span>
    <div class="row justify-content-center mb-3">
        <h4>Speakers</h4>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Tipe Speaker</th>
                            <th scope="col">List Speaker</th>
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
                                <td>
                                    <ul class="list-group">
                                        @foreach ($item->listSpeaker as $ls)
                                            <li class="list-group-item">{{ $ls->name }}
                                                <br>
                                                <i class="fa fa-institution"></i>
                                                {{ $ls->institution }}
                                                <br>
                                                <i class="fa fa-user"></i>
                                                {{ $ls->position }}
                                                <br>
                                                <button class="btn btn-danger mx-1"
                                                    wire:click="hapus_detail('{{ $ls->id }}')">Hapus</button>
                                                <button class="btn btn-warning mx-1" data-toggle="modal"
                                                    data-target="#modal_edit"
                                                    wire:click="edit_detail('{{ $ls->id }}')">Edit</button>

                                            </li>
                                        @endforeach
                                    </ul>
                                    <br>
                                    <div class="d-flex justify-content-end">

                                        <button class="btn btn-info" wire:click="tambah('{{ $item->id }}')">Tambah
                                            List Speaker</button>
                                    </div>
                                </td>

                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-warning mx-1" data-toggle="modal"
                                            data-target="#modalEditRundown"
                                            wire:click="edit_hari('{{ $item->id }}')">Edit Jenis Speaker</button>

                                        <button class="btn btn-danger mx-1"
                                            wire:click="hapus_acara('{{ $item->id }}')">Hapus Jenis
                                            Speaker</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" wire:ignore.self id="modalAddSpeaker" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Speaker</h5>
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
                    <h5 class="modal-title" id="modal">Tambah List Speaker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_speaker">Nama Speaker</label>
                        <input type="text" name="name_speaker" class="form-control" id="name_speaker"
                            rows="5" wire:model="name_speaker"></input>
                        @error('name_speaker')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="institution">institusi</label>
                        <input type="text" name="institution" class="form-control" id="institution"
                            rows="5" wire:model="institution"></input>
                        @error('institution')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" id="position" rows="5"
                            wire:model="position"></input>
                        @error('position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="image">Foto Speaker</label>
                        <input type="file" class="form-control-file" id="image" wire:model="image"
                            accept=".jpg,.png,.jpeg,.pdf">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <span wire:loading wire:target="image" class="text-success">Mengupload......... <br></span>

                        @if ($image)
                            <img class="img-thumbnail" height="100px" width="100px"
                                src="{{ $image->temporaryUrl() }}" />
                        @endif
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
                            <input type="text" name="organizer" class="form-control" id="organizer"
                                rows="5" wire:model="organizer"></input>
                            @error('organizer')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group">
                            <label for="start_time">Waktu Mulai</label>
                            <input type="time" name="start_time" class="form-control" id="start_time"
                                rows="5" wire:model="start_time"></input>
                            @error('start_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="form-group">
                            <label for="end_time">Waktu Selesai</label>
                            <input type="time" name="end_time" class="form-control" id="end_time"
                                rows="5" wire:model="end_time"></input>
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

    <div class="modal" id="modal-edit" tabindex="-1" wire:ignore.self aria-labelledby="modal-edit"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Edit List Speaker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name_speaker">Nama Speaker baru</label>
                        <input type="text" name="name_speaker" class="form-control" id="name_speaker"
                            rows="5" wire:model="name_speaker"></input>
                        @error('name_speaker')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="institution">institusi</label>
                        <input type="text" name="institution" class="form-control" id="institution"
                            rows="5" wire:model="institution"></input>
                        @error('institution')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" name="position" class="form-control" id="position" rows="5"
                            wire:model="position"></input>
                        @error('position')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="image">Foto Speaker</label>
                        <input type="file" class="form-control-file" id="image" wire:model="image"
                            accept=".jpg,.png,.jpeg,.pdf">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <span wire:loading wire:target="image" class="text-success">Mengupload......... <br></span>


                        @if ($image)
                            <img class="img-thumbnail" height="100px" width="100px"
                                src="{{ $image->temporaryUrl() }}" />
                        @endif
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
