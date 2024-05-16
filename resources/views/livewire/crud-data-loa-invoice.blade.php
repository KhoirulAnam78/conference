<div>
    <div class="form-group" wire:ignore>
        <label for="kop">KOP Surat</label>
        <textarea name="kop" id="kop" class="summernote">{{ $kop }}</textarea>
        @error('kop')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="stempel">Stempel</label>
        <input type="file" class="form-control-file" id="stempel" wire:model="stempel" accept=".jpg,.png,.jpeg">
        @error('stempel')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">

        <span wire:loading wire:target="stempel" class="text-success">Mengupload......... <br></span>

        @if ($pathStempel != null && $stempel == null)
            <img class="img-thumbnail" alt="" height="100" width="100px"
                src="{{ asset('storage/' . $pathStempel) }}">
        @endif
        @if ($stempel)
            <img class="img-thumbnail" height="100px" width="100px" src="{{ $stempel->temporaryUrl() }}" />
        @endif
    </div>
    <div class="form-group">
        <label for="ttd_loa">Nama Penandatangan LOA</label>
        <input type="text" class="form-control" id="ttd_loa" wire:model="ttd_loa">
        @error('ttd_loa')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="image_ttd_loa">Upload Tanda Tangan untuk LOA</label>
        <input type="file" class="form-control-file" id="image_ttd_loa" wire:model="image_ttd_loa"
            accept=".jpg,.png,.jpeg">
        @error('image_ttd_loa')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="image_ttd_loa" class="text-success">Mengupload......... <br></span>

        @if ($pathTtdLoa != null && $image_ttd_loa == null)
            <img class="img-thumbnail" alt="" height="100" width="100px"
                src="{{ asset('storage/' . $pathTtdLoa) }}">
        @endif
        @if ($image_ttd_loa)
            <img class="img-thumbnail" height="100px" width="100px" src="{{ $image_ttd_loa->temporaryUrl() }}" />
        @endif
    </div>

    <div class="form-group">
        <label for="ttd_invoice">Nama Penandatangan Invoice</label>
        <input type="text" class="form-control" id="ttd_invoice" wire:model="ttd_invoice">
        @error('ttd_invoice')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="image_ttd_invoice">Upload Tanda Tangan untuk Invoice</label>
        <input type="file" class="form-control-file" id="image_ttd_invoice" wire:model="image_ttd_invoice"
            accept=".jpg,.png,.jpeg">
        @error('image_ttd_invoice')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="image_ttd_invoice" class="text-success">Mengupload......... <br></span>

        @if ($pathTtdInvoice != null && $image_ttd_invoice == null)
            <img class="img-thumbnail" alt="" height="100" width="100px"
                src="{{ asset('storage/' . $pathTtdInvoice) }}">
        @endif
        @if ($image_ttd_invoice)
            <img class="img-thumbnail" height="100px" width="100px" src="{{ $image_ttd_invoice->temporaryUrl() }}" />
        @endif
    </div>

    <div class="form-group">
        <label for="ttd_receipt">Nama Penandatangan Receipt/Kwitansi</label>
        <input type="text" class="form-control" id="ttd_receipt" wire:model="ttd_receipt">
        @error('ttd_receipt')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="image_ttd_receipt">Upload Tanda Tangan untuk Receipt/Kwitansi</label>
        <input type="file" class="form-control-file" id="image_ttd_receipt" wire:model="image_ttd_receipt"
            accept=".jpg,.png,.jpeg">
        @error('image_ttd_receipt')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="image_ttd_receipt" class="text-success">Mengupload......... <br></span>

        @if ($pathTtdReceipt != null && $image_ttd_receipt == null)
            <img class="img-thumbnail" alt="" height="100" width="100px"
                src="{{ asset('storage/' . $pathTtdReceipt) }}">
        @endif
        @if ($image_ttd_receipt)
            <img class="img-thumbnail" height="100px" width="100px"
                src="{{ $image_ttd_receipt->temporaryUrl() }}" />
        @endif
    </div>

    <div class="form-group">
        <span class="btn btn-primary" onclick="saveContent()" wire:loading.attr.class="disabled">
            <span wire:loading.remove wire:target="save">Simpan</span>
            <span wire:loading wire:target="save">Simpan...</span>
        </span>
    </div>
</div>

@push('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                // callbacks: {
                //     onChange: function(contents, $editable) {
                //         @this.set('kop', contents);
                //         console.log('CHANGE');
                //         console.log(contents);
                //     }
                // }
            });
        });

        function saveContent() {
            let kopValue = $('.summernote').summernote('code');
            $this.set('content', kopValue);
            @this.save();

        }

        document.addEventListener('alert', function(e) {
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: "success"
            });
        })
    </script>
@endpush
