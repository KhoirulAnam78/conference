<div>
    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h4 class="mb-3">Profile Information</h4>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="full_name1">Full Name</label>
            <input type="text" class="form-control @error('full_name1') is-invalid @enderror" wire:model="full_name1"
                id="full_name1" name="full_name1" placeholder="Full Name (without academic title) Ex: Muhammad Ridho">
            @error('full_name1')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <small id="fullName" class="form-text text-muted my-2"></small>
            <input type="text" class="form-control @error('full_name2') is-invalid @enderror" wire:model="full_name2"
                id="full_name2" name="full_name2"
                placeholder="Full Name (with academic title) Ex: Dr. Muhammad Ridho, M.Sc">
            @error('full_name2')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="gender" class="d-block">Gender</label>
            <label class="form-text text-muted d-inline">
                <input type="radio" name="options" wire:model='gender' id="gender" autocomplete="off"
                    value="male"> Male
            </label>
            <label class="form-text text-muted d-inline">
                <input type="radio" name="options" wire:model='gender' id="gender" autocomplete="off"
                    value="female">
                Female
            </label>
            @error('gender')
                <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="participant">
                Participant
            </label>
            <select class="custom-select @error('participant_type') is-invalid @enderror" id="participant_type"
                name="participant_type" wire:model='participant_type'>
                <option value="">Choose One</option>
                <option value="professional presenter">Professional presenter</option>
                <option value="student presenter">Student presenter</option>
                <option value="participant">Participant</option>
            </select>
            @error('participant_type')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}
        {{-- <div class="form-group">
            <label for="participant">
                Attendance
            </label>
            <select class="custom-select @error('attendance') is-invalid @enderror" id="attendance" name="attendance"
                wire:model='attendance'>
                <option value="">Choose One</option>
                <option value="online">Online</option>
                <option value="offline">Offline</option>
            </select>
            @error('attendance')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

        <div class="form-group">
            <label for="institution">Institution</label>
            <textarea class="form-control @error('institution') is-invalid @enderror" id="institution" rows="3"
                placeholder="Institution Name" name="institution" wire:model='institution'></textarea>
            @error('institution')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3"
                placeholder="Full Address" name="address" wire:model='address'></textarea>
            @error('address')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="phone"
                placeholder="Phone Number" name="phone" wire:model='phone'>
            @error('phone')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="hki_id">HKI Member Status</label>
            <input type="text" disabled class="form-control" id="hki_id" placeholder="Member ID"
                value="{{ $hki_status }}" name="hki_id">
        </div>

        {{-- <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="hki_id">HKI Member ID</label>
                    <input type="text" class="form-control" id="hki_id" placeholder="Member ID"
                        wire:model='hki_id' name="hki_id">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="image">HKI Member Card</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" accept=".jpg,.png,.jpeg,.gif,.svg"
                                class="custom-file-input @error('member_card') is-invalid @enderror" id="member_card"
                                wire:model='member_card'>
                            <label class="custom-file-label" for="member_card">
                                {{ $member_card == null ? 'Choose' : $member_card->getClientOriginalName() }}
                            </label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>
                    @error('image')
                        <span class="invalid-feedback" style="display:block">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div> --}}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                aria-describedby="emailHelp" placeholder="Enter email" name="email" wire:model='email'>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
