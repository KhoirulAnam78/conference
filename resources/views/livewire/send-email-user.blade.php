<div>
    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form wire:submit.prevent="sendEmail">
        <div class="form-group">
            <label for="participant">
                Send To
            </label>
            <select class="custom-select @error('sendTo') is-invalid @enderror" id="sendTo" name="sendTo"
                wire:model.defer='sendTo'>
                <option value="">Choose One</option>
                <option value="all-registered">All registered user</option>
                <option value="not-yet-paid">All participants whose abstracts were accepted (not yet paid)</option>
                <option value="have-paid">All participant who have paid</option>
                @foreach ($participant as $item)
                    <option value="{{ $item->email }}">{{ $item->email }}</option>
                @endforeach
            </select>
            @error('sendTo')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control @error('subject') is-invalid @enderror" wire:model.defer="subject"
                id="subject" name="subject" placeholder="Subject">
            @error('subject')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Message</label>
            <textarea class="form-control @error('email') is-invalid @enderror" id="email" rows="5" placeholder="Message"
                name="email" wire:model.defer='email'></textarea>
            @error('email')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="form-group">
                    <label for="file">File (optional)</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept=".jpg,.png,.jpeg,.gif,.svg,.docx,.pdf"
                                class="custom-file-input @error('file') is-invalid @enderror" id="file"
                                wire:model.defer='file'>
                            <label class="custom-file-label" for="file">
                                {{ $file == null ? 'Choose' : $file->getClientOriginalName() }}
                            </label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">
                                <div wire:loading wire:target="file">

                                    Uploading ...

                                </div>
                            </span>
                        </div>
                    </div>
                    @error('file')
                        <span class="invalid-feedback" style="display:block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" wire:target="save" wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="save">Send</span>
            <span wire:loading wire:target="save">Sending..</span>
        </button> <br>
        <span class="text-danger" wire:loading>Note : Mohon tunggu sampai proses selesai,
            semakin banyak user yang menerima maka
            semakin lama proses pengiriman email, harap bersabar !</span>
    </form>
</div>
