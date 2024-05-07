<div>
    <span class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalScope">Tambah Scope</span>
    <div class="row justify-content-center mb-3">
        <h4>DAFTAR SCOPE</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                @foreach ($data as $item)
                    <div class="row">
                        <div class="col-8">
                            <li class="list-group-item">{{ $item->scope_name }} </li>
                        </div>
                        <div class="col-4">
                            <span class="btn btn-danger" wire:click="hapus({{ $item->id }})">Hapus</span>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="modalScope" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Scope</h5>
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
            $('#modalScope').modal('hide');
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: "success"
            });
        })
    </script>
@endpush
