@extends('admin.home')

@section('content')



    <form method="post" action="{{route('customers.add')}}" enctype="multipart/form-data">
        @csrf
        <h1 style="text-align: center">Thêm thông tin khách hàng</h1>
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
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>

    </form>
@endsection
