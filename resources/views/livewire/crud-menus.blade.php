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
                            <th scope="col">Status</th>
                            <th scope="col">Permission</th>
                            {{-- <th scope="col">Position</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $m)
                            <tr>
                                <td>{{ ($menus->currentpage() - 1) * $menus->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->status }}</td>
                                <td>{{ $m->permission_name }}</td>
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
                    <m class="flex-grow-1">Total data : {{ $menus->total() }}</m>
                    <nav aria-label="..." class="pagination justify-content-end flex-shrink-0">
                        {{ $menus->links() }}
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
                    <h5 class="modal-title" id="modal">Add Menu Group</h5>
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
                        <label for="permission_name">Permission</label>
                        <select class="form-control" name="permission_name"
                            id="permission_name"wire:model="permission_name">
                            <option value="">Choose</option>
                            @foreach ($permissions as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('permission_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status"wire:model="status">
                            <option value="">Choose</option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </select>
                        @error('status')
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
                    <h5 class="modal-title" id="modal">Edit Menu Group</h5>
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
                        <label for="permission_name">Permission</label>
                        <select class="form-control" name="permission_name"
                            id="permission_name"wire:model="permission_name">
                            <option value="">Choose</option>
                            @foreach ($permissions as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('permission_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status"wire:model="status">
                            <option value="">Choose</option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </select>
                        @error('status')
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
