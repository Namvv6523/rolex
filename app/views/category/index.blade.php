@extends('layout.index')
@section('content')
    <div class="container">
        <div class="  d-flex justify-content-between ">
            <div class="font-weight-bold h3 ">
                <p class="">Danh sách danh mục</p>
            </div>

            <div class="">
                <a href="{{ BASE_URL }}category/store" class="btn btn-primary">+ Thêm danh mục</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            @foreach ($category as $cate)
                <tbody>
                    <td>{{ $cate->id }}</td>
                    <td>{{ $cate->name }}</td>
                    <td>
                        <a href="{{ BASE_URL }}category/detail/{{ $cate->id }}" class="btn btn-primary">Edit</a>
                        <a href="{{ BASE_URL }}category/delete/{{ $cate->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
