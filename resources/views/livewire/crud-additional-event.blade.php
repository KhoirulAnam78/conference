<div>
    <div class="{{ $add == false ? '' : 'd-none' }}">
        <span class="btn btn-primary mb-3" wire:click="navigation(true)">Tambah</span>
        <h5>
            LIST ADDITIONAL EVENTS
        </h5>
        <div class="table-responsive">
            <table class="table table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @php
                    $a = 0;
                @endphp
                <tbody>
                    @forelse ($events as $i)
                        <tr>
                            <td>{{ ++$a }}</td>
                            <td>{{ $i->name }}</td>
                            <td>
                                <span class="btn btn-danger" wire:click="hapus({{ $i->id }})"
                                    wire:target="hapus({{ $i->id }})" wire:loading.attr.class="disabled">
                                    <span wire:loading.remove wire:target="hapus({{ $i->id }})">Hapus</span>
                                    <span wire:loading wire:target="hapus({{ $i->id }})">Hapus...</span>
                                </span>
                                <span class="btn btn-primary" wire:click="showEdit({{ $i->id }})"
                                    wire:target="showEdit({{ $i->id }})" wire:loading.attr.class="disabled">
                                    <span wire:loading.remove wire:target="showEdit({{ $i->id }})">Edit</span>
                                    <span wire:loading wire:target="showEdit({{ $i->id }})">Edit...</span>
                                </span>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="div {{ $add == false ? 'd-none' : '' }}">
        <span class="btn btn-primary mb-3" wire:click="navigation(false)">Kembali</span>
        <div class="form-group">
            <label for="name">Nama Event</label>
            <input type="text" class="form-control" id="name" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group" wire:ignore>
            <label for="text">Konten Halaman</label>
            <textarea name="content" id="content" class="summernote"></textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <span class="btn btn-primary" onclick="saveContent()" wire:loading.attr.class="disabled">
                <span wire:loading.remove wire:target="save">Simpan</span>
                <span wire:loading wire:target="save">Simpan...</span>
            </span>
        </div>
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
                //         @this.set('content', contents);
                //     }
                // }
            });
        });

        function saveContent() {
            let value = $('.summernote').summernote('code');
            @this.set('content', value);
            @this.save();

        }

        document.addEventListener('summernote-value', function(e) {
            $('.summernote').summernote('code', e.detail.value);

        })

        document.addEventListener('alert', function(e) {
            Swal.fire({
                title: e.detail.title,
                text: e.detail.message,
                icon: "success"
            });
        })
    </script>
@endpush
