<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalPreviously">Tambah Previously Event</span>
    <div class="row justify-content-center mb-3">
        <h4>Daftar Previously Event</h4>
    </div>

    <div class="col-lg-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">URL Event</th>
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
                                <td>{{ $item->url }}</td>
                                <td>
                                    <div class="row justify-content-center">
                                        <button class="btn btn-danger mx-1"
                                            wire:click="hapus('{{ $item->id }}')">Hapus</button>
                                        <button class="btn btn-warning mx-1" data-toggle="modal"
                                            data-target="#modalPreviouslyEdit"
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

    <div class="modal fade" wire:ignore.self id="modalPreviously" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Previously Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Previously Event</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="url">URL Previously Event</label>
                        <input type="text" name="url" class="form-control" id="url" rows="5"
                            wire:model="url"></input>
                        @error('url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="save" wire:loading.attr="disabled"
                        wire:target="save">
                        <span wire:loading.remove wire:target="save">Tambah</span>
                        <span wire:loading wire:target="save">Tambah...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="modalPreviouslyEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Previously Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama Previously Event Baru</label>
                        <input type="text" name="name" class="form-control" id="name" rows="5"
                            wire:model="name"></input>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="url">URL Previously Event Baru</label>
                        <input type="text" name="url" class="form-control" id="url" rows="5"
                            wire:model="url"></input>
                        @error('url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="update" wire:loading.attr="disabled"
                        wire:target="update">
                        <span wire:loading.remove wire:target="update">Simpan</span>
                        <span wire:loading wire:target="update">Simpan...</span>
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
        document.addEventListener('show-edit', function(e) {
            $('#modalPreviouslyEdit').modal('show');
        })
    </script>
@endpush
