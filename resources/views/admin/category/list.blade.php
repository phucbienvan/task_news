
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $item)
                <tr class="odd gradeX" align="center">
                    <td>{{$item['id']}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['desc']}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('category.delete', $item['id'])}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('category.edit', $item['id'])}}">Edit</a></td>
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
