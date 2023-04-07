@extends('admin.parent')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="container">


            <a href="{{ route('santri.create') }}" class="btn btn-primary  mt-3">
                Add Santri
            </a>
        
            <div class="container mt-2">
                <table class="table table-striped">
                    <thead>
                       <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td>City</td>
                        <td>Date</td>
                        <td>Action</td>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach ($santri as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->city }}</td>
                            <td>{{ $row->date }}</td>
                            <td>
                                <a href="{{ route('santri.show', $row->id) }}" class="btn btn-primary m-1">Show</a>
        
                                <a href="{{ route('santri.edit', $row->id) }}" class="btn btn-warning m-1">Edit</a>
        
                                <form action="{{ route('santri.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-1" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
</div>
@endsection