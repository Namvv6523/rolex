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
                    <h4 class="card-title justify-content-center">Thêm danh mục</h4>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ BASE_URL }}category/update/{{$cate->id}}">
                    <div class="mb-3 mx-auto w-50">
                        <label class="form-label">ID</label>
                        <input disabled type="text" class="form-control" name="id">
                    </div>

                    <div class="mb-3 mx-auto w-50">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$cate->name}}">
                    </div>


                    <div class="d-flex justify-content-center">
                        <input type="submit" name="submit" value="Cập nhập" class="btn btn-success mt-3 ">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
