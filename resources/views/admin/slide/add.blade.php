
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
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
                <form action="admin/slide/add" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label> Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Name" />
                    </div>
                    <div class="form-group">
                        <label> Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Please Enter image" />
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="desc" placeholder="Please Enter " />
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Please Enter " />
                    </div>

                    <button type="submit" class="btn btn-default">Slide Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
