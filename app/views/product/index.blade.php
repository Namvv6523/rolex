@extends('layout.index')
@section('content')
    <div class="container">
        <div class="  d-flex justify-content-between ">
            <div class="font-weight-bold h3 ">
                <p class="">Danh sách sản phẩm</p>
            </div>

            <div class="">
                <a href="{{ BASE_URL }}product/store" class="btn btn-primary">+ Thêm sản phẩm</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <td> <div><input type="checkbox" name="" ></div></td>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Số lượng</th>
                <th>Action</th>
            </thead>
            @foreach ($product as $prd)
                <tbody>
                    <td> <div><input type="checkbox" name="" ></div></td>
                    <td>{{ $prd->id }}</td>
                    <td>{{ $prd->name }}</td>
                    <td><img src="<?= '../upload/' . $prd->img ?>" width="50px" alt=""></td>
                    <td>{{ $prd->price }}</td>
                    <td>{{ $prd->categoryId }}</td>
                    <td>{{ $prd->quantity }}</td>
                    <td>
                        <a href="{{ BASE_URL }}category/detail/{{ $cate->id }}" class="btn btn-primary" >Edit</a>
                        <a href="{{ BASE_URL }}product/delete/{{ $prd->id }}" class="btn btn-danger"  >Delete</a>
                    </td>
                </tbody>
            @endforeach

        </table>
    </div>
@endsection
