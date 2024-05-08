<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-add">Tambah Scope</span>
    <div class="row justify-content-center mb-3">
        <h4>DAFTAR SCOPE</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($data as $item)
                    <div class="row mb-2">
                        <div class="col-8">
                            <li class="list-group-item">{{ $item->scope_name }} </li>
                        </div>
                        <div class="col-4">
                            <span class="btn btn-danger" wire:click="hapus({{ $item->id }})"
                                wire:target="hapus({{ $item->id }})" wire:loading.attr.class="disabled">
                                <span wire:loading.remove wire:target="hapus({{ $item->id }})">Hapus</span>
                                <span wire:loading wire:target="hapus({{ $item->id }})">Hapus...</span>
                            </span>
                            <span class="btn btn-primary" wire:click="showEdit({{ $item->id }})"
                                wire:target="showEdit({{ $item->id }})" wire:loading.attr.class="disabled">
                                <span wire:loading.remove wire:target="showEdit({{ $item->id }})">Edit</span>
                                <span wire:loading wire:target="showEdit({{ $item->id }})">Edit...</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="modal" id="modal-add" tabindex="-1" wire:ignore.self aria-labelledby="modal-add"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Tambah Scope</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="scope_name">Nama Scope</label>
                        <textarea name="scope_name" class="form-control" id="scope_name" rows="5" wire:model="scope_name"></textarea>
                        @error('scope_name')
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

    <div class="modal" id="modal-edit" tabindex="-1" wire:ignore.self aria-labelledby="modal-edit"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Edit Scope</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="scope_name">Nama Scope</label>
                        <textarea name="scope_name" class="form-control" id="scope_name" rows="5" wire:model="scope_name"></textarea>
                        @error('scope_name')
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
        });

        document.addEventListener('show-edit', function(e) {
            $('#modal-edit').modal('show');
        })
        document.addEventListener('close-edit', function(e) {
            $('#modal-edit').modal('hide');
        })
    </script>
@endpush
