<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-add">Tambah</span>
    <div class="row justify-content-center mb-3">
        <h4>Menu Management</h4>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <input type="text" id="search" name="search" wire:model="search" class="form-control"
                placeholder="Search here..">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            {{-- <th scope="col">Position</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $m)
                            <tr>
                                <td>{{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $m->email }}</td>
                                <td>
                                    @foreach ($m->roles as $r)
                                        {{ $r->name }}
                                    @endforeach
                                </td>
                                {{-- <td>{{ $m->posision }}</td> --}}
                                <td>
                                    <span class="btn btn-primary btn-sm mb-3"
                                        wire:click="showEdit('{{ $m->id }}')"
                                        wire:target="showEdit('{{ $m->id }}')"
                                        wire:loading.attr.class="disabled">
                                        <span wire:loading.remove
                                            wire:target="showEdit('{{ $m->id }}')">Edit</span>
                                        <span wire:loading wire:target="showEdit('{{ $m->id }}')">Edit...</span>
                                    </span>
                                    @can('login_as')
                                        @can('developer')
                                            <span class=>
                                                <form action="{{ route('loginAs') }}" class="mb-2" method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="user_login_as" value="{{ $m->email }}">
                                                    <input type="hidden" name="user_request_login_as"
                                                        value="{{ auth()->user()->email }}">
                                                    <button class="btn btn-primary btn-sm" type="submit">LoginAs</button>
                                                </form>
                                            </span>
                                        @endcan
                                    @endcan
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
                    <m class="flex-grow-1">Total data : {{ $users->total() }}</m>
                    <nav aria-label="..." class="pagination justify-content-end flex-shrink-0">
                        {{ $users->links() }}
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
                        <label for="email">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            aria-describedby="emailHelp" placeholder="Enter email" name="email"
                            wire:model.debounce.500ms='email'>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            wire:model.debounce.500ms='password' autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role">Roles</label>
                        <select class="form-control" name="role" id="role"wire:model="role">
                            <option value="">Choose</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
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
                    <h5 class="modal-title" id="modal">Edit Role User {{ $email }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        wire:click="empty()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role">Roles</label>
                        <select class="form-control" name="role" id="role"wire:model="role">
                            <option value="">Choose</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
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
