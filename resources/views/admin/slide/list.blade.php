
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>List</small>
                </h1>
            </div>
            @if(session('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
        @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>image</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($slide as $item)
                <tr class="odd gradeX" align="center">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <img width="200px" src="uploads/slides/{{$item->image}}">
                    </td>
                    <td>{{$item->desc}}</td>
                    <td>{{$item->link}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('slide.delete', $item->id)}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('slide.edit', $item->id)}}">Edit</a></td>
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
