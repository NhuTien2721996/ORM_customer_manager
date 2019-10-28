@extends('admin.home')
@section('content')

    <form method="post" action="{{route('customers.update',$customer->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$customer->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{$customer->email}}">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" value="{{$customer->address}}">
        </div>
        <div class="form-group">
            <label for="inputFileName">File Name</label>
            <input type="text"
                   class="form-control"
                   id="inputFileName"
                   name="inputFileName"
                   value="{{$customer->image}}">
            <input type="file"
                   class="form-control-file"
                   id="inputFile"
                   name="inputFile">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>


@endsection
