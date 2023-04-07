@extends('admin.parent')

@section('content')
    <label for="" class="form-label">Nama Siswa</label>
    <input type="text" class="form-control" value="{{ $siswa->name }}" readonly>

    <label for="" class="form-label mt-3">Nomer Siswa</label>
    <input type="text" class="form-control" value="{{ $siswa->phone }}" readonly>

    <label for="" class="form-label mt-3">Alamat Siswa</label>   
    <textarea cols="30" rows="10" class="form-control" readonly>{!! $siswa->address !!}</textarea>

    <a href="{{ route('siswa.index') }}" class="btn btn-outline-info mt-3">Back</a>
@endsection