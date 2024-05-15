<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalPartner">Tambah Media Partner</span>
    <div class="row justify-content-center mb-3">
        <h4>Daftar Media Partner</h4>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">image</th>
                            <th scope="col">URL Partner</th>
                            <th scope="col">Desc</th>
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
                                    <div>
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            class="mr-3" style="width: 50px; height: 50px;">
                                    </div>
                                </td>
                                <td>{{ $item->url }}</td>
                                <td>{{ $item->info_partner }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-danger mx-1"
                                            wire:click="hapus('{{ $item->id }}')">Hapus</button>
                                        <button class="btn btn-warning mx-1" data-toggle="modal"
                                            data-target="#modalPartnerEdit"
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

    <div class="modal fade" wire:ignore.self id="modalPartner" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Partner</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="url">URL Partner</label>
                        <input type="text" name="url" class="form-control" id="url" rows="5"
                            wire:model="url"></input>
                        @error('url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="desc">Info Partner (Optional)</label>
                        <input type="text" name="desc" class="form-control" id="desc" rows="5"
                            wire:model="desc"></input>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="image">Logo Partner</label>
                        <input type="file" class="form-control-file" id="image" wire:model="image"
                            accept=".jpg,.png,.jpeg,.pdf">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <span wire:loading wire:target="image" class="text-success">Mengupload.........
                            <br></span>

                        @if ($image)
                            <img class="img-thumbnail" height="100px" width="100px"
                                src="{{ $image->temporaryUrl() }}" />
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="save">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="modalPartnerEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Partner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Partner</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="url">URL Partner</label>
                        <input type="text" name="url" class="form-control" id="url" rows="5"
                            wire:model="url"></input>
                        @error('url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="desc">Info Partner (Optional)</label>
                        <input type="text" name="desc" class="form-control" id="desc" rows="5"
                            wire:model="desc"></input>
                        @error('desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="image">Logo Partner</label>
                        <input type="file" class="form-control-file" id="image" wire:model="image"
                            accept=".jpg,.png,.jpeg,.pdf">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <span wire:loading wire:target="image" class="text-success">Mengupload.........
                            <br></span>
                        @if ($old_path != null && $image == null)
                            <br>
                            <label for="old_path">Foto lama :</label>
                            <img class="img-thumbnail" alt="" height="100" width="100px"
                                src="{{ asset('storage/' . $old_path) }}">
                        @endif

                        @if ($image)
                            <img class="img-thumbnail" height="100px" width="100px"
                                src="{{ $image->temporaryUrl() }}" />
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update">Simpan</button>
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
        document.addEventListener('show-edit', function(e) {
            $('#modalPartnerEdit').modal('show');
        })
    </script>
@endpush
