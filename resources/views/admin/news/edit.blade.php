@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit News
                    <small>{{$news->name}}</small>
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
                <form action="admin/news/edit/{{$news->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category">
                            @foreach($category as $item)
                                <option
                                    @if($news->category->id == $item->id)
                                        {{"selected"}}
                                        @endif
                                    value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" name="name" value="{{$news->name}}" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label> Description</label>
                        <textarea class="form-control ckeditor" id="demo" name="desc" rows="3">{{$news->desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Content</label>
                        <textarea class="form-control ckeditor" id="demo" name="contents" rows="5">{{$news->contents}}</textarea>
                    </div>
                    <div class="form-group">
                        <label> Image</label><br>
                        <img width="500px" src="uploads/news/{{$news->image}}"><br>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter image" />
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <label class="radio-inline">
                            <input name="status" value="1"
                                   @if($news->status == 1)
                                       {{"checked"}}
                                       @endif
                                   type="radio">Nổi bật
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0"
                                   @if($news->status == 0)
                                   {{"checked"}}
                                   @endif
                                   type="radio">Không nổi bật
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">News Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
