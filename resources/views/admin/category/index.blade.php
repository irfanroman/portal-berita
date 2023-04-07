@extends('admin.parent')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">With Home Icon</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ 'home' }}"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('category.index') }}"></a> Category</li>
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

            <div class="col-12">
                    <form action="{{ route('searchCategory') }}" method="get">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Category"  aria-describedby="button-addon2" name="keyword">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                </div>
                    </form>
            </div>


            <!-- Create Modal -->
            <div class="container d-flex justify-content-end">
                <!-- Create Modal -->
                <button type="button" class="btn btn-primary my-auto" data-bs-toggle="modal"
                    data-bs-target="#createCategoryModal">
                    <i class="bx bxs-plus-square"><span> Add Category</span></i>
                </button>
                @include('admin.category.create-modal')
                <!-- End Create Modal-->
            </div>
            <!-- End Create Modal -->
        </div>
    </div>

    <div class="container">
        <!-- Table with stripped rows -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->slug }}</td>
                    <td><img src="{{ $row->image }}" class="w-25" alt=""></td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <!-- Edit Modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editCategoryModal{{ $row->id }}">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>

                        <form action="{{ route('category.destroy', $row->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-2" type="submit">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                        <!-- End Edit Modal -->

                        @include('admin.category.edit-modal')
                    </td>
                </tr>
                @empty
                    <tr>
                        <th colspan="6" class="text-center">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                Data Kosong
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </th>
                    </tr>
                @endforelse
                @foreach ($category as $row)
                   
                @endforeach
            </tbody>
        </table>

        {{ $category->links('pagination::bootstrap-5') }}
        <!-- End Table with stripped rows -->
    </div>
@endsection
