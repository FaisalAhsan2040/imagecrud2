@extends('product.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('_create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>

            <th>Name</th>
            <th>Roll No</th>
            <th>Phone</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->roll_no }}</td>
            <td>{{ $student->phone }}</td>
            <td><img src="/image/{{ $student->image }}" width="100px"></td>
            <td>
                <a class="btn btn-info" href="{{ url('edit/',$student->id)}}">Edit</a>
                <a class="btn btn-primary" href="{{ url('delete/',$student->id) }}">Delete</a>            
            </td>
        </tr>
        @endforeach
    </table>
        
@endsection  