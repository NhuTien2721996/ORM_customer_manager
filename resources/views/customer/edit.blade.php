@extends('admin.home')
@section('content')

    <form method="post" action="{{route('customers.update',$customer->id)}}" enctype="multipart/form-data">
        @csrf
        <h1 style="text-align: center">Thay đổi thông tin khách hàng</h1>
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
            <label>Image</label>
            <img src="{{asset('storage/image/'.$customer->image)}}" width="50" height="40">
            <label>Image NEW</label>
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>


@endsection
