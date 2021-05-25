
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Content</th>
                    <th>Views</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                <tr class="odd gradeX" align="center">
                    <td>{{$item->id}}</td>
                    <td>
                        <p>{{$item->name}}</p>
                        <img width="100px" src="uploads/news/{{$item->image}}">
                    </td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->desc}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->views}}</td>
                    <td>
                        @if($item->status == 0)
                            {{'Không nổi bật'}}
                        @else
                            {{'Nổi bật'}}
                        @endif

                    </td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/{{$item->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$item->id}}">Edit</a></td>
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
