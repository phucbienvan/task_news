
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>Add</small>
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
                <form action="admin/news/add" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label> Description</label>
                        <textarea class="form-control ckeditor" id="demo" name="desc" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Content</label>
                        <textarea class="form-control ckeditor" id="demo" name="contents" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label> Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter image" />
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Nổi bật
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" type="radio">Không nổi bật
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">News Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
