<div>
    <div class="form-group">
        <label for="slider1">Image Slider 1</label>
        <input type="file" class="form-control-file" id="slider1" wire:model="slider1" accept=".jpg,.png,.jpeg">
        @error('slider1')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="slider1" class="text-success">Mengupload......... <br></span>

        @if ($path1 != null && $slider1 == null)
            <img class="img-thumbnail" alt="" height="500" src="{{ asset('storage/' . $path1) }}">
        @endif
        @if ($slider1)
            <img class="img-thumbnail" height="500px" src="{{ $slider1->temporaryUrl() }}" />
        @endif
    </div>

    <div class="form-group">
        <label for="slider2">Image Slider 2</label>
        <input type="file" class="form-control-file" id="slider2" wire:model="slider2" accept=".jpg,.png,.jpeg">
        @error('slider2')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="slider2" class="text-success">Mengupload......... <br></span>

        @if ($path2 != null && $slider2 == null)
            <img class="img-thumbnail" alt="" height="500px" src="{{ asset('storage/' . $path2) }}">
        @endif
        @if ($slider2)
            <img class="img-thumbnail" height="500px" src="{{ $slider2->temporaryUrl() }}" />
        @endif
    </div>

    <div class="form-group">
        <label for="slider3">Image Slider 3</label>
        <input type="file" class="form-control-file" id="slider3" wire:model="slider3" accept=".jpg,.png,.jpeg">
        @error('slider3')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">

        <span wire:loading wire:target="slider3" class="text-success">Mengupload......... <br></span>

        @if ($path3 != null && $slider3 == null)
            <img class="img-thumbnail" alt="" height="500px" src="{{ asset('storage/' . $path3) }}">
        @endif
        @if ($slider3)
            <img class="img-thumbnail" height="500px" src="{{ $slider3->temporaryUrl() }}" />
        @endif
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
