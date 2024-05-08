<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalDownloadFile">Tambah File Download</span>
    <div class="row justify-content-center mb-3">
        <h4>Daftar File Download</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($data as $item)
                    <li class="list-group-item">{{ $item->name }}
                        {{-- <span class="btn btn-danger"
                            wire:click="hapus({{ $item->id }})">Hapus</span> --}}
                    </li>
                @endforeach
            </ul>
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
                            accept=".jpg,.png,.jpeg">
                        @error('path_file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <span wire:loading wire:target="path_file" class="text-success">Mengupload......... <br></span>

                        {{-- @if ($pathLogo != null && $path_file == null)
                            <img class="img-thumbnail" alt="" height="100" width="100px"
                                src="{{ asset('storage/' . $pathLogo) }}">
                        @endif
                        @if ($path_file)
                            <img class="img-thumbnail" height="100px" width="100px"
                                src="{{ $path_file->temporaryUrl() }}" />
                        @endif --}}
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
