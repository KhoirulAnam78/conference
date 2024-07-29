<div>

    @if ($review !== true)

        <div class="row mb-2">
            <div class="col-lg-6">
                <button wire:click="export()" wire:target="export" class="btn btn-success" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="export">Export</span>
                    <span wire:loading wire:target="export">Exporting..</span>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="search2">Search</label>
                    <input type="text" class="form-control" id="search2" name="search2"
                        wire:model.debounce.500ms="search2" placeholder="Search by presenter name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="participant">
                        Filter Status Reviewed
                    </label>
                    <select class="custom-select" id="status" name="status" wire:model='status'>
                        <option value="">All</option>
                        <option value="ted">Reviewed</option>
                        <option value="not yet reviewed">Not yet reviewed</option>
                    </select>
                </div>

                {{-- <div class="form-group">
                <label for="status">Filter Status HKI Member</label>
                <select name="status" id="status" wire:model='status' class="form-control">

                </select>
            </div> --}}
            </div>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Email Register</th>
                                <th>Full Name</th>
                                <th scope="col">Presenter</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Reviewed By</th>
                                <th scope="col">LOA</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($abstracts) == 0)
                                <tr>
                                    <td colspan="10" align="center">No data</td>
                                </tr>
                            @endif
                            @foreach ($abstracts as $item)
                                <tr>
                                    <td>{{ ($abstracts->currentpage() - 1) * $abstracts->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $item->participant->user->email }}</td>
                                    <td>{{ $item->participant->full_name1 }}</td>
                                    <td>{{ $item->presenter }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->reviewed_by }}</td>
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
                                        @can('do_review_abstract')
                                            <button class="btn btn-primary"
                                                wire:click="showReview('{{ $item->id }}')">Review</button>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <ul class="pagination pagination-sm mt-3 float-right ">
                    @if (count($abstracts) != 0)
                        {{ $abstracts->links() }}
                    @endif
                </ul>
            </div>
        </div>
    @else
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>

        <div class="row">
            <div class="form-group mx-3">
                <label for="topic">
                    Topic
                </label>
                <select disabled class="custom-select @error('topic') is-invalid @enderror" id="topic"
                    name="topic" wire:model='topic'>
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
        </div>
        <div class="form-group">
            <label for="type">
                Type
            </label>
            <select disabled class="custom-select @error('type') is-invalid @enderror" id="type" name="type"
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
            <textarea disabled class="form-control @error('title') is-invalid @enderror" id="title" rows="3"
                placeholder="All Authors" name="title" wire:model='title'></textarea>
            @error('title')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="authors">All Authors</label>
            <textarea disabled class="form-control @error('authors') is-invalid @enderror" id="authors" rows="3"
                placeholder="All Authors" name="authors" wire:model='authors'></textarea>
            @error('authors')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="institutions">Institutions</label>
            <textarea disabled class="form-control @error('institutions') is-invalid @enderror" id="institutions"
                placeholder="Institutions" rows="3" name="institutions" wire:model='institutions'></textarea>
            @error('institutions')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="abstract">Content of Abstract</label>
            <textarea disabled class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="15"
                placeholder="Content of abstract" name="abstract" wire:model='abstract'></textarea>
            @error('abstract')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea disabled class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                placeholder="Institutions" rows="3" name="keywords" wire:model='keywords'></textarea>
            @error('keywords')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="presenter">Presenter</label>
            <input disabled type="text" class="form-control @error('presenter') is-invalid @enderror"
                id="presenter" aria-describedby="emailHelp" name="presenter" wire:model='presenter'>
            @error('presenter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="modal-footer">
            @if (!$loa)
                <button class="btn btn-danger" wire:click='showReject()' wire:target="showReject"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="showReject">Reject</span>
                    <span wire:loading wire:target="showReject">Rejecting..</span>
                </button>
            @endif

            <button class="btn btn-primary" wire:click='showValidate()' wire:target="showValidate"
                wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="showValidate">Accept</span>
                <span wire:loading wire:target="showValidate">Accepting..</span>
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                wire:click="back()">Cancel</button>
        </div>

        <div class="modal" id="modalValidate" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Accept Abstract</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center my-3">Data for Letter of Acceptance and Invoice</h4>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                id="full_name" aria-describedby="emailHelp" name="full_name" wire:model='full_name'>
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                id="email" aria-describedby="emailHelp" name="email" wire:model='email'>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="institution">Institution</label>
                            <textarea class="form-control @error('institution') is-invalid @enderror" id="institution"
                                aria-describedby="emailHelp" name="institution" wire:model='institution'> </textarea>
                            @error('institution')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="abstractTitle">Abstract Title</label>
                            <textarea type="text" class="form-control @error('abstractTitle') is-invalid @enderror" id="abstractTitle"
                                aria-describedby="emailHelp" name="abstractTitle" wire:model='abstractTitle'> </textarea>
                            @error('abstractTitle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="participant_type">Author Type</label>
                            <input type="text"
                                class="form-control @error('participant_type') is-invalid @enderror"
                                id="participant_type" aria-describedby="emailHelp" placeholder="Presenter"
                                name="participant_type" wire:model='participant_type'>
                            @error('participant_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fee">Fee</label>
                            <input type="text" class="form-control @error('fee') is-invalid @enderror"
                                id="fee" aria-describedby="emailHelp" name="fee" wire:model='fee'>
                            @error('fee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="accept()" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="accept">Send to {{ $email }}</span>
                            <span wire:loading wire:target="accept">Sending to {{ $email }}..</span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modalReject" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditTitle">Reject Abstract</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center my-3">Send message to author</h4>
                        <div class="form-group">
                            <label for="rejectMessage">Message</label>
                            <textarea class="form-control @error('rejectMessage') is-invalid @enderror" id="rejectMessage" rows="5"
                                aria-describedby="emailHelp" name="rejectMessage" wire:model='rejectMessage'> </textarea>
                            @error('rejectMessage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="reject()" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="reject">Send to {{ $email }}</span>
                            <span wire:loading wire:target="reject">Sending to {{ $email }}..</span>
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @section('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#modalValidate').modal('hide');
            });
            window.addEventListener('show-modal', event => {
                // console.log('MASUK SINI');
                $('#modalValidate').modal('show');
            });
            window.addEventListener('close-reject', event => {
                $('#modalReject').modal('hide');
            });
            window.addEventListener('show-reject', event => {
                // console.log('MASUK SINI');
                $('#modalReject').modal('show');
            });
        </script>
    @endsection
</div>
