@extends('layout.index')
@section('content')

    @if (isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <span style="color: green">{{ $_SESSION['success'] }}</span>
    @endif

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title justify-content-center">Thêm sản phẩm</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ BASE_URL }}product/create" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Loại sản phẩm <span style="color: red">*</span></label>
                                <select class="selectpicker form-control" data-style="py-0" name="iddm">
                                    <option value="">--Chọn danh mục--</option>
                                    @foreach ($loadCate as $cate)
                                        <option value=" {{ $cate->id }}" class="fs-6 h-25"> {{ $cate->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Tên sản phẩm <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Giá <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="price">
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Hình ảnh <span style="color: red">*</span></label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label class="form-label">Số lượng <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="quantity">
                        </div>

                        <div class="d-flex justify-content-center col-md-12">
                            <input type="submit" name="submit" value="Thêm" class="btn btn-success mt-3 ">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
