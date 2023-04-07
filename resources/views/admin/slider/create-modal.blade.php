<div class="modal fade" id="createSliderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row mb-3 mx-3">
                        <label for="inputName5" class="form-label">Input Link</label>
                        <input type="text" class="form-control" id="inputName5" name="url" value="{{ old('url') }}">
                    </div>
                        <div class="row mb-3 mx-3">
                            <label for="inputImage" class="form-label">Add Image</label>
                            <input class="form-control" type="file" id="inputImage" name="image">
                            <div class="col-sm-10">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
            </form>
        </div>
    </div>
</div>

