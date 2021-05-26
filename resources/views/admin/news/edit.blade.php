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


{{--        Comment--}}
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comment
                    <small>List Comment</small>
                </h1>
            </div>

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Ngày cập nhật</th>

                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news->comment as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$item->id}}/{{$news->id}}"> Delete </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
