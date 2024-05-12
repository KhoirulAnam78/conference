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
        <label for="abbreviation">Singkatan</label>
        <input type="text" class="form-control" id="abbreviation" wire:model="abbreviation">
        @error('abbreviation')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
        <label for="topic">Tema Kegiatan</label>
        <input type="text" class="form-control" id="topic" wire:model="topic">
        @error('topic')
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
        <label for="recipient">Nama Penerima</label>
        <input type="text" class="form-control" id="recipient" wire:model="recipient">
        @error('recipient')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="bank_name">Nama BANK</label>
        <input type="text" class="form-control" id="bank_name" wire:model="bank_name">
        @error('bank_name')
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

    <div class="form-group">
        <label for="start_date_conference">Conference Dates</label>
        <div class="row">
            <div class="col-6">
                <input type="date" class="form-control" id="start_date_conference"
                    wire:model="start_date_conference">
            </div>
            <div class="col-6">
                <input type="date" class="form-control" id="end_date_conference" wire:model="end_date_conference">
            </div>
            @error('start_date_conference')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('end_date_conference')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="contact">Contacts</label>
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" id="contact_name" placeholder="Nama Lengkap"
                    wire:model="contact_name">
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="contact_number" placeholder="Nomor Telepon"
                    wire:model="contact_number">
            </div>
        </div>
        @error('contact')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <span class="btn btn-success btn-sm my-2" wire:click="addContact()" wire:target="addContact"
            wire:loading.attr.class="disabled">
            <span wire:loading.remove wire:target="addContact">Tambah Kontak</span>
            <span wire:loading wire:target="addContact">Tambah Kontak ..</span>
        </span> <br>
        <span>DAFTAR KONTAK</span> <br>

        <ul class="list-group">
            @foreach ($list_contact as $key => $c)
                <li class="list-group-item">{{ $c['name'] }} ({{ $c['number'] }})
                    <span class="btn btn-danger btn-sm" wire:click="deleteContact({{ $key }})"
                        wire:target="deleteContact({{ $key }})"
                        wire:loading.attr.class="disabled">Hapus</span>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- <div class="form-group">
        <label for="text">TEXT EDITOR</label>
        <textarea name="summernote" id="summernote"></textarea>
        @error('text')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> --}}
    <div class="form-group">
        <label for="zoom_id">Zoom Meeting ID</label>
        <input type="text" class="form-control" id="zoom_id" wire:model="zoom_id">
        @error('zoom_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="zoom_pass">Zoom Passcode</label>
        <input type="text" class="form-control" id="zoom_pass" wire:model="zoom_pass">
        @error('zoom_pass')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="zoom_link">Zoom Link</label>
        <input type="text" class="form-control" id="zoom_link" wire:model="zoom_link">
        @error('zoom_link')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

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
