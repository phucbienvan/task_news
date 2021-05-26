
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
                <form action="{{route('category.add')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                    </div>

                    <div class="form-group">
                        <label>Category Description</label>
                        <textarea class="form-control" name="desc" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default" name="add">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
