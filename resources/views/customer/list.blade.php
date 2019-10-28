@extends('admin.home')

@section('content')
    <table class="table table-striped table-dark">
        <thead>
        <h1 style="color: red ; text-align: center">Customer Manager</h1>
        <a href="{{route('customers.create')}}"><button type="button">ADD</button></a>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Image</th>
            <th scope="col">Delete</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customer as $key=> $value)
            <tr>
                <th scope="row">{{++$key}}</th>
                <th scope="row">{{$value->name}}</th>
                <th scope="row">{{$value->email}}</th>
                <th scope="row">{{$value->address}}</th>
                <th scope="row"><img src="{{ asset('storage/image/' . $value->image) }}" alt="" style="width: 150px"></th>
                <th scope="row"><a href="{{route('customers.delete',$value->id)}}">Delete</a></th>
                <th scope="row"><a href="{{route('customers.edit',$value->id)}}">Edit</a></th>

            </tr>
        @endforeach
    </table>

@endsection
