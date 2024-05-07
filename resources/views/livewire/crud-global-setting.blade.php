<div>
    <div class="form-group">
        <label for="title">Judul Konferensi</label>
        <input type="text" class="form-control" id="title" wire:model="title">
        @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" wire:model="website">
        @error('website')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" wire:model="email">
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="payment_number">Nomor Rekening</label>
        <input type="text" class="form-control" id="payment_number" wire:model="payment_number">
        @error('payment_number')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="logo">Logo Konferensi</label>
        <input type="file" class="form-control-file" id="logo" wire:model="logo" accept=".jpg,.png,.jpeg">
        @error('logo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="logo" class="text-success">Mengupload......... <br></span>

        @if ($pathLogo != null && $logo == null)
            <img class="img-thumbnail" alt="" height="100" width="100px"
                src="{{ asset('storage/' . $pathLogo) }}">
        @endif
        @if ($logo)
            <img class="img-thumbnail" height="100px" width="100px" src="{{ $logo->temporaryUrl() }}" />
        @endif
    </div>

    {{-- <div class="form-group">
        <label for="contact">Kontak</label>
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" id="contact" placeholder="Nama Lengkap"
                    wire:model="contact">
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="contact" placeholder="Nomor Telepon"
                    wire:model="contact">
            </div>
        </div>
        @error('contact')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <span class="btn btn-success btn-sm my-2">Tambah Kontak</span> <br>
        <span>DAFTAR KONTAK</span> <br>

        <ul class="list-group">
            <li class="list-group-item">085788787427 <span class="btn btn-danger btn-sm" wire:click="">Hapus</span>
            </li>
        </ul>
    </div> --}}

    {{-- <div class="form-group">
        <label for="text">TEXT EDITOR</label>
        <textarea name="summernote" id="summernote"></textarea>
        @error('text')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}

    <div class="form-group">
        <span class="btn btn-primary" wire:click="save" wire:loading.attr.class="disabled">
            <span wire:loading.remove wire:target="save">Simpan</span>
            <span wire:loading wire:target="save">Simpan...</span>
        </span>
    </div>
</div>


@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // $(document).ready(function() {
        //     $('#summernote').summernote();
        // });

        document.addEventListener('alert', function(e) {
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: "success"
            });
        })
    </script>
@endpush
