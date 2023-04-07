@extends('admin.parent')

@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endforeach
@endif

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create Santri</h5>

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
            <div class="card p-3 mt-3">
                <form class="row g-3" action="{{ route('santri.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <label for="" class="form-label">Name Santri</label>
                    <input type="text" class="form-control" name="name"></input>
                    <br>
                    <label for="" class="form-label">Phone Santri</label>
                    <input type="number" class="form-control" name="phone">
                    <br>
                    <label for="" class="form-label">City Santri</label>
                    <input type="text" class="form-control" name="city">
                    <br>`
                    <label for="" class="form-label">Date Santri</label>
                    <input type="date" class="form-control" name="date">
                    <br>
                    <label for="" class="form-label">Address Santri</label>
                    <textarea
                     class="form-control" cols="30" rows="5" name="address"></textarea>
                    <button type="submit" class="btn btn-primary mt-3" >Add Santri</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection