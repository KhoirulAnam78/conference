<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalDownloadFile">Tambah File Download</span>
    <div class="row justify-content-center mb-3">
        <h4>Daftar File Download</h4>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Name File</th>
                            <th scope="col">File</th>
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
                                    @if ($item->path_file)
                                        <a href="{{ asset('storage/' . $item->path_file) }}" target="_blank"
                                            style="color:red; font-size:20px"> <button class="btn btn-info">lihat
                                                file</button>
                                        </a>
                                    @endif
                                </td>

                                <td>
                                    <div class="row justify-content-center mx-1">
                                        <button class="btn btn-danger"
                                            wire:click="hapus('{{ $item->id }}')">Hapus</button>
                                        <button class="btn btn-warning" data-toggle="modal"
                                            data-target="#modalEditDownloadFile"
                                            wire:click="showEdit('{{ $item->id }}')">Edit</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" wire:ignore.self id="modalDownloadFile" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah File Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file_name">Nama File Download</label>
                        <input type="text" file_name="file_name" class="form-control" id="file_name" rows="5"
                            wire:model="file_name"></input>
                        @error('file_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="path_file">File Berkas</label>
                        <input type="file" class="form-control-file" id="path_file" wire:model="path_file"
                            accept=".jpg,.png,.jpeg,.pdf">
                        @error('path_file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <span wire:loading wire:target="path_file" class="text-success">Mengupload......... <br></span>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Tambah</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" wire:ignore.self id="modalEditDownloadFile" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit File Download</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="file_name">Nama baru file download</label>
                        <input type="text" file_name="file_name" class="form-control" id="file_name" rows="5"
                            wire:model="file_name"></input>
                        @error('file_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                    <div class="form-group">
                        <label for="path_file">File berkas</label>
                        <input type="file" class="form-control-file" id="path_file" wire:model="path_file"
                            accept=".jpg,.png,.jpeg,.pdf">
                        @error('path_file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <span wire:loading wire:target="path_file" class="text-success">Mengupload.........
                            <br></span>
                    </div>

                    @if ($old_path)
                        <a href="{{ asset('storage/' . $old_path) }}" target="_blank">File lama</a>
                    @endif



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update">Edit</button>
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
