<!-- Modal -->
<div class="modal fade" id="tagModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tagModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tagModalLabel">Assign Visitor Tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <form action="{{ route('tag.assign', $appointment->id) }}" method="POST" id="tag_form">
                            @csrf
                            <label class="mb-1" for="tag_id">Select Tag</label>
                            <select class="form-select" name="tag_id" aria-label="Default select example" required>
                                {{-- <option selected>Assign Tag</option> --}}
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->number }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="tag_form">Submit</button>
            </div>
        </div>
    </div>
</div>
