<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-add">Tambah</span>
    <div class="row justify-content-center mb-3">
        <h4>Permissions</h4>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <input type="text" wire:model="search" class="form-control" placeholder="Search here..">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Name</th>
                            <th scope="col">Guard Name</th>
                            <th>Desc</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $p)
                            <tr>
                                <td>{{ ($permissions->currentpage() - 1) * $permissions->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->guard_name }}</td>
                                <td>{{ $p->descriptions }}</td>
                                <td>
                                    <span class="btn btn-danger" wire:click="hapus({{ $p->id }})"
                                        wire:target="hapus({{ $p->id }})" wire:loading.attr.class="disabled">
                                        <span wire:loading.remove wire:target="hapus({{ $p->id }})">Hapus</span>
                                        <span wire:loading wire:target="hapus({{ $p->id }})">Hapus...</span>
                                    </span>
                                    <span class="btn btn-primary" wire:click="showEdit({{ $p->id }})"
                                        wire:target="showEdit({{ $p->id }})" wire:loading.attr.class="disabled">
                                        <span wire:loading.remove
                                            wire:target="showEdit({{ $p->id }})">Edit</span>
                                        <span wire:loading wire:target="showEdit({{ $p->id }})">Edit...</span>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" align="center">No Data..</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="py-4 d-flex">
                    <p class="flex-grow-1">Total data : {{ $permissions->total() }}</p>
                    <nav aria-label="..." class="pagination justify-content-end flex-shrink-0">
                        {{ $permissions->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-add" tabindex="-1" wire:ignore.self aria-labelledby="modal-add"
        data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Add Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="empty()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name">Guard Name</label>
                        <input type="text" wire:model="guard_name" class="form-control">
                        {{-- <textarea guard_name="guard_name" class="form-control" id="guard_name" rows="5" wire:model="guard_name"></textarea> --}}
                        @error('guard_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descriptions">Descriptions</label>
                        <textarea descriptions="descriptions" class="form-control" id="descriptions" rows="5" wire:model="descriptions"></textarea>
                        @error('descriptions')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="empty()">Close</button>
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
                    <h5 class="modal-title" id="modal">Edit Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="empty()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guard_name">Guard Name</label>
                        <input type="text" wire:model="guard_name" class="form-control">
                        {{-- <textarea guard_name="guard_name" class="form-control" id="guard_name" rows="5" wire:model="guard_name"></textarea> --}}
                        @error('guard_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="descriptions">Descriptions</label>
                        <textarea descriptions="descriptions" class="form-control" id="descriptions" rows="5"
                            wire:model="descriptions"></textarea>
                        @error('descriptions')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="empty()">Close</button>
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
