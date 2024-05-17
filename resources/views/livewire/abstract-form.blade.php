<div>
    @if ($add == true)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Add Abstract</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="topic">
                    Topic
                </label>
                <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic"
                    wire:model='topic'>
                    <option value="">Choose One</option>
                    @foreach ($scopes as $i)
                        <option value="{{ $i->id }}">{{ $i->scope_name }}</option>
                    @endforeach
                </select>
                @error('topic')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">
                    Type
                </label>
                <select class="custom-select @error('type') is-invalid @enderror" id="type" name="type"
                    wire:model='type'>
                    <option value="">Choose One</option>
                    <option value="oral presentation">Oral Presentation</option>
                </select>
                @error('type')
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
                <label for="authors">All Authors</label>
                <textarea class="form-control @error('authors') is-invalid @enderror" id="authors" rows="3"
                    placeholder="All Authors" name="authors" wire:model='authors'></textarea>
                @error('authors')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="institutions">Institutions</label>
                <textarea class="form-control @error('institutions') is-invalid @enderror" id="institutions" rows="3"
                    placeholder="Institutions" name="institutions" wire:model='institutions'></textarea>
                @error('institutions')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="abstract">Content of Abstract</label>
                <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="3"
                    placeholder="Content of abstract" name="abstract" wire:model='abstract'></textarea>
                @error('abstract')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                    placeholder="Keywords" name="keywords" wire:model='keywords'>
                @error('keywords')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="presenter">Presenter</label>
                <input type="text" class="form-control @error('presenter') is-invalid @enderror" id="presenter"
                    aria-describedby="emailHelp" placeholder="Presenter" name="presenter" wire:model='presenter'>
                @error('presenter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>
    @elseif ($edit == true)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Edit Abstract</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label for="topic">
                    Topic
                </label>
                <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic"
                    wire:model='topic'>
                    <option value="">Choose One</option>
                    @foreach ($scopes as $i)
                        <option value="{{ $i->id }}">{{ $i->scope_name }}</option>
                    @endforeach
                </select>
                @error('topic')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">
                    Type
                </label>
                <select class="custom-select @error('type') is-invalid @enderror" id="type" name="type"
                    wire:model='type'>
                    <option value="">Choose One</option>
                    <option value="oral presentation">Oral Presentation</option>
                </select>
                @error('type')
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
                <label for="authors">All Authors</label>
                <textarea class="form-control @error('authors') is-invalid @enderror" id="authors" rows="3"
                    placeholder="All Authors" name="authors" wire:model='authors'></textarea>
                @error('authors')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="institutions">Institutions</label>
                <textarea class="form-control @error('institutions') is-invalid @enderror" id="institutions" rows="3"
                    placeholder="Institutions" name="institutions" wire:model='institutions'></textarea>
                @error('institutions')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="abstract">Content of Abstract</label>
                <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="3"
                    placeholder="Content of abstract" name="abstract" wire:model='abstract'></textarea>
                @error('abstract')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                    placeholder="Keywords" name="keywords" wire:model='keywords'>
                @error('keywords')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="presenter">Presenter</label>
                <input type="text" class="form-control @error('presenter') is-invalid @enderror" id="presenter"
                    aria-describedby="emailHelp" placeholder="Presenter" name="presenter" wire:model='presenter'>
                @error('presenter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>
    @else
        <button class="btn btn-primary" wire:click="add()">Add Abstract</button>
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (count($abstracts) !== 0)
            <table class="table my-3">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th>LOA</th>
                        <th>Invoice</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $a = 0;
                    @endphp
                    @foreach ($abstracts as $item)
                        <tr>
                            <th scope="row">{{ ++$a }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if ($item->loa)
                                    <a href="{{ asset('storage/' . $item->loa) }}" target="_blank"
                                        style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                            aria-hidden="true"></i></a>
                                @endif
                            </td>
                            <td>
                                @if ($item->invoice)
                                    <a href="{{ asset('storage/' . $item->invoice) }}" target="_blank"
                                        style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                            aria-hidden="true"></i>
                                    </a>
                                @endif
                            </td>

                            <td>
                                @if ($item->status == 'not yet reviewed')
                                    <button class="btn btn-info"
                                        wire:click='editAbstract({{ $item->id }})'>edit</button>
                                @else
                                    <p>No actions</p>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</div>
