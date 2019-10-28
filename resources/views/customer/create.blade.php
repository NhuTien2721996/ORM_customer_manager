@extends('admin.home')

@section('content')



    <form method="post" action="{{route('customers.add')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label for="inputFileName">File Name</label>
            <input type="text"
                   class="form-control"
                   id="inputFileName"
                   name="inputFileName">
            <input type="file"
                   class="form-control-file"
                   id="inputFile"
                   name="inputFile">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>

    </form>
@endsection
