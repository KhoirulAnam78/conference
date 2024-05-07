<div>
    <h4>Update Password</h4>
    <small class="my-3">Ensure your account is using a long, random password to stay secure.</small>
    @if (session('message'))
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form method="post" wire:submit.prevent="save" class="mt-6 space-y-6">
        @csrf

        @method('put')
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input wire:model.debounce.500ms='current_password' id="current_password" type="password"
                class="form-control @error('current_password') is-invalid @enderror" name="current_password"
                autocomplete="current_password">
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input wire:model.debounce.500ms='password' id="password" type="password"
                class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input wire:model.debounce.500ms='password_confirmation' id="password_confirmation" type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
