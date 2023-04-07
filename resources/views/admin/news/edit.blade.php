@extends('admin.parent')


@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Your News</h5>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bi bi-house-door"></i></a></li>
          <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Show News</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>
      @if ($errors->any())
      @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="bi bi-exclamation-octagon me-1"></i>
              {{ $error }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      @endforeach
  @endif

      <div class="card p-3" >
        <form class="row g-3" action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="col-md-12">
              <label for="inputNewsName" class="form-label">Title News</label>
              <input type="text" class="form-control" id="inputNewsName" value="{{ $news->title }}" name="title" required>
            </div>
            <div class="col-md-12">
              <label for="inputImageNews" class="form-label">Image News</label>
              <input type="file" class="form-control" id="inputImageNews" value="{{$news->image }}" name="image" >
            </div>
            <div class="col-md-12">
              <label for="inputCategoryNews" class="form-label">Category news</label>
              <select id="inputCategoryNews" class="form-select" name="category_id">
                <option required selected value="{{ $news->category->id }}">{{ $news->category->name }}</option>
                <option required>===Choose...===</option>
                @foreach ($category as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
              </select>

              <div class="col-md-12">
                <label class="form-label" >Description News</label>
                <textarea id="editor" name="description" cols="30" rows="10">{!! $news->description !!}</textarea>
                <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
                <script>
                  ClassicEditor
                      .create( document.querySelector( '#editor' ) )
                      .catch( error => {
                          console.error( error );
                      } );
              </script>
              

              </div>

            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Save Changes</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>
    
      </div>
    </div>
</div>
@endsection