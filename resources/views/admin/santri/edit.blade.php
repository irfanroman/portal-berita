@extends('admin.parent')

@section('content')
<form action="{{ route('santri.update', $santri->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="" class="form-label">Nama Santri</label>
    <input type="text" class="form-control" value="{{ $santri->name }}" name="name" >
    
    <label for="" class="form-label mt-3">Nomer Santri</label>
    <input type="text" class="form-control" value="{{ $santri->phone }}" name="phone" >
    
    <label for="" class="form-label mt-3">City Santri</label>
    <input type="text" class="form-control" value="{{ $santri->city }}" name="city" >
    
    <label for="" class="form-label mt-3">Date Santri</label>
    <input type="text" class="form-control" value="{{ $santri->date }}" name="date" >
    
    <label for="" class="form-label mt-3">Alamat Santri</label>   
    <textarea cols="30" rows="10" class="form-control" name="address" >{{ $santri->address }}</textarea>
    
    <button type="submit" class="btn btn-primary mt-3" >Save Changes</button>
@endsection