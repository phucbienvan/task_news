

@extends('layout.index')

@section('content')
    <script src="admin_asset/dist/js/extra.js"></script>
    <!-- Page Content -->
    <div class="container">

        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Thông tin tài khoản</h4></div>
                    <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <strong>{{ $err }}</strong><br/>
                                @endforeach
                            </div>
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        <form action="{{route('edit.customer')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <label>Tên Người Dùng</label>
                                <input type="text" class="form-control" name="name" aria-describedby="basic-addon1" value="{{ $customer->name }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label> Image</label><br>
                                <img width="500px" class="img-responsive" src="{{asset('uploads/users/' . $customer->image)}}">
                                <input type="file" class="form-control" name="image" placeholder="Please Enter image" />
                            </div>
                            <div>
                                <label>Địa Chỉ Email</label>
                                <input type="email" class="form-control" name="email" aria-describedby="basic-addon1" value="{{ $customer->email }}">
                            </div>
                            <br>
                            <div>
                                <label>mat khau</label>
                                <input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
                            <br>
                            <button type="submit" class="btn btn-primary">Thực Hiện
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection
