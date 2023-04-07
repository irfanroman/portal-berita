@extends('admin.parent')

@section('content')
<label for="" class="form-label">Nama Santri</label>
<input type="text" class="form-control" value="{{ $santri->name }}" readonly>

<label for="" class="form-label mt-3">Nomer Santri</label>
<input type="text" class="form-control" value="{{ $santri->phone }}" readonly>

<label for="" class="form-label mt-3">City Santri</label>
<input type="text" class="form-control" value="{{ $santri->city }}" readonly>

<label for="" class="form-label mt-3">Date Santri</label>
<input type="text" class="form-control" value="{{ $santri->date }}" readonly>

<label for="" class="form-label mt-3">Alamat Santri</label>   
<textarea cols="30" rows="10" class="form-control" readonly>{!! $santri->address !!}</textarea>

<a href="{{ route('santri.index') }}" class="btn btn-outline-info mt-3">Back</a>
@endsection