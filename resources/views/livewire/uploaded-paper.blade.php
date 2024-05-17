<div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="search2">Search</label>
                <input type="text" class="form-control" id="search2" name="search2" wire:model.debounce.500ms="search2"
                    placeholder="Search by title or full name">
            </div>
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
                            <th scope="col">Title</th>
                            <th scope="col">Email</th>
                            <th>Full Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Validated By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($fulltexts) == 0)
                            <tr>
                                <td colspan="7" align="center">No data</td>
                            </tr>
                        @endif
                        @foreach ($fulltexts as $item)
                            <tr>
                                <td>{{ ($fulltexts->currentpage() - 1) * $fulltexts->perpage() + $loop->index + 1 }}
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->payment->participant->user->email }}</td>
                                <td class="text-nowrap">{{ $item->payment->participant->full_name1 }}</td>
                                <td>{{ $item->validation }}</td>
                                <td>{{ $item->validated_by }}</td>
                                <td><button class="btn btn-primary" wire:click="showValidate('{{ $item->id }}')"
                                        wire:target="showValidate('{{ $item->id }}')"
                                        wire:loading.attr="disabled">Validate</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <ul class="pagination pagination-sm mt-3 float-right ">
                @if (count($fulltexts) != 0)
                    {{ $fulltexts->links() }}
                @endif
            </ul>
        </div>
    </div>

    <div class="modal" id="modalValidate" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        wire:ignore.self aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditTitle">Validate Fulltext</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="empty()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" disabled class="form-control @error('title') is-invalid @enderror"
                            id="title" name="title" wire:model="title" placeholder="judul">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fulltext">Full Text</label>
                        <a href="{{ asset('storage/' . $fulltext) }}" style="color:black" target="_blank"
                            class="d-block"><i class="fa fa-file-pdf-o" style="color:red; font-size:30px"
                                aria-hidden="true"></i>
                            {{ $fulltext }}
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button wire:click="invalid()" class="btn btn-danger" wire:target="invalid"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="invalid">Invalid</span>
                        <span wire:loading wire:target="invalid">Validating..</span>
                    </button>
                    <button wire:click="valid()" wire:target="valid" class="btn btn-primary"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="valid">Valid</span>
                        <span wire:loading wire:target="valid">Validating..</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="empty()"
                        wire:target="empty" wire:loading.attr="disabled">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#modalValidate').modal('hide');
            });
            window.addEventListener('show-modal', event => {
                // console.log('MASUK SINI');
                $('#modalValidate').modal('show');
            });
        </script>
    @endsection
</div>
