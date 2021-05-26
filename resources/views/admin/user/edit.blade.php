@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) >0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $item)
                            {{$item}}<br>
                        @endforeach
                    </div>
                @endif
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <form action="admin/user/edit/{{$user->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" name="name" value="{{$user->name}}" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label> Image</label><br>
                        <img width="500px" src="uploads/users/{{$user->image}}"><br>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter image" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$user->email}}" name="email" placeholder="Please Enter " />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" value="{{$user->password}}" placeholder="Please Enter " />
                    </div>
                    <div class="form-group">
                        <label>User Level</label><br>
                        <label class="radio-inline">
                            <input name="level" value="1"
                                   @if($user->level == 1)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="0"
                                   @if($user->level == 0)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Customer
                        </label>
                    </div>

                    <button type="submit" class="btn btn-default">User Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
