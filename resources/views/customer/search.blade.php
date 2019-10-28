@extends('admin.home')

@section('content')
    <form enctype="multipart/form-data" method="post">
        @csrf
        <table class="table table-striped">
            <thead>
            <h1 style="color: red ; text-align: center">Danh sách khách hàng</h1>
            <tr>
                <input type="text" name="search" >
                <button type="submit" class="btn btn-primary">Search</button>
            </tr>
            <tr>
                <td><a href="{{route('customers.create')}}">
                        <button type="button" class="btn btn-success">ADD</button>
                    </a></td>
            </tr>
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
                    <th scope="row"><img src="{{ asset('storage/image/' . $value->image) }}" alt=""
                                         style="width: 150px"></th>
                    <th scope="row"><a href="{{route('customers.delete',$value->id)}}">
                            <button type="button" class="btn btn-link">Delete</button>
                        </a></th>
                    <th scope="row"><a href="{{route('customers.edit',$value->id)}}">
                            <button type="button" class="btn btn-link">Edit</button>
                        </a></th>

                </tr>
            @endforeach
        </table>
    </form>
{{--    {{$dataSearch->links()}}--}}

@endsection
