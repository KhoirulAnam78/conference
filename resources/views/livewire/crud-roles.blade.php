<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-add">Tambah</span>
    <div class="row justify-content-center mb-3">
        <h4>Menu Management</h4>
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $m)
                            <tr>
                                <td>{{ ($roles->currentpage() - 1) * $roles->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->guard_name }}</td>
                                {{-- <td>{{ $m->posision }}</td> --}}
                                <td>
                                    <span class="btn btn-danger" wire:click="hapus('{{ $m->id }}')"
                                        wire:target="hapus('{{ $m->id }}')" wire:loading.attr.class="disabled">
                                        <span wire:loading.remove
                                            wire:target="hapus('{{ $m->id }}')">Hapus</span>
                                        <span wire:loading wire:target="hapus('{{ $m->id }}')">Hapus...</span>
                                    </span>
                                    <span class="btn btn-primary" wire:click="showEdit('{{ $m->id }}')"
                                        wire:target="showEdit('{{ $m->id }}')"
                                        wire:loading.attr.class="disabled">
                                        <span wire:loading.remove
                                            wire:target="showEdit('{{ $m->id }}')">Edit</span>
                                        <span wire:loading wire:target="showEdit('{{ $m->id }}')">Edit...</span>
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
                    <m class="flex-grow-1">Total data : {{ $roles->total() }}</m>
                    <nav aria-label="..." class="pagination justify-content-end flex-shrink-0">
                        {{ $roles->links() }}
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
                    <h5 class="modal-title" id="modal">Add Roles</h5>
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
                    <div class="mb-3">
                        <label>Select Permissions</label>
                    </div>
                    <div class="form-check">
                        <div class="row">
                            <div class="col-6">
                                <input class="form-check-input" type="checkbox" id="selectAll" value="all"
                                    wire:model.live='selectAll'>
                                <label class="form-check-label" for="selectAll">
                                    Select All
                                </label>
                            </div>
                            @foreach ($permissions as $item)
                                <div class="col-6" wire:key='{{ $item->id }}'>
                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}"
                                        id="permission{{ $item->id }}" wire:model='permission'>
                                    <label class="form-check-label" for="permission{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        @error('permission')
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
                    <h5 class="modal-title" id="modal">Edit Roles</h5>
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
                    <div class="mb-3">
                        <label>Select Permissions</label>
                    </div>
                    <div class="form-check">
                        <div class="row">
                            <div class="col-6">
                                <input class="form-check-input" type="checkbox" id="selectAll" value="all"
                                    wire:model.live='selectAll'>
                                <label class="form-check-label" for="selectAll">
                                    Select All
                                </label>
                            </div>
                            @foreach ($permissions as $item)
                                <div class="col-6" wire:key='{{ $item->id }}'>
                                    <input class="form-check-input" type="checkbox" value="{{ $item->name }}"
                                        id="permission{{ $item->id }}" wire:model='permission'>
                                    <label class="form-check-label" for="permission{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        @error('permission')
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
