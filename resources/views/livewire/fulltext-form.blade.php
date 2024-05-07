<div>
    @if ($add == true)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Upload Fulltext</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="save">

            <div class="form-group">
                <label for="payment_id">
                    Upload For Abstract
                </label>
                <select class="custom-select @error('payment_id') is-invalid @enderror" id="payment_id" name="payment_id"
                    wire:model='payment_id'>
                    <option value="">Choose One</option>
                    @foreach ($payment as $item)
                        <option value="{{ $item->id }}">{{ $item->uploadAbstract->title }}</option>
                    @endforeach
                </select>
                @error('payment_id')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title" name="title" wire:model='title'>
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="fulltext">Upload Fulltext (.pdf)</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" accept=".pdf"
                            class="custom-file-input @error('fulltext') is-invalid @enderror" id="fulltext"
                            wire:model.debounce.500ms='fulltext'>
                        <label class="custom-file-label" for="fulltext">
                            {{ $fulltext == null ? 'Choose' : $fulltext->getClientOriginalName() }}
                        </label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                    </div>
                </div>
                @error('fulltext')
                    <span class="invalid-feedback" style="display:block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>
    @else
        @if (count($payment) == 0)
            <button class="btn btn-primary" disabled>Upload Paper</button>
        @else
            <button class="btn btn-primary" wire:click="add()">Upload Paper</button>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (count($fulltexts) !== 0)
            <table class="table my-3">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">File</th>
                        <th scope="col">Status</th>
                        <th scope="col">Validated by</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $a = 0;
                    @endphp
                    @foreach ($fulltexts as $item)
                        <tr>
                            <th scope="row">{{ ++$a }}</th>
                            <td>{{ $item->title }}</td>
                            <td><a href="{{ asset('uploads/' . $item->fulltext) }}" target="_blank"
                                    style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                        aria-hidden="true"></i>
                                </a></td>
                            <td>{{ $item->validation }}</td>
                            <td>{{ $item->validated_by }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
