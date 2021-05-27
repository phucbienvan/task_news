

@extends('layout.index')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="row">

            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
{{--                        <h4><b>{{ $category->name }}</b></h4>--}}
                    </div>

                    @foreach($news as $chitiet)
                        <div class="row-item row">
                            <div class="col-md-3">

                                <a href="tin-tuc/{{ $chitiet->id }}.html">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive" src="uploads/news/{{ $chitiet->image }}" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3><a href="news/{{ $chitiet->id }}.html">{{ $chitiet->name }}</a></h3>
                                <p>{!! $chitiet->desc !!}</p>
                                <a class="btn btn-primary" href="news/{{ $chitiet->id }}.html">Xem Thêm.. <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                @endforeach

                <!-- Pagination -->
                    <div class="row text-center">
{{--                        {{ $tintuc->links() }}--}}
                    </div>
                    <!-- /.row -->

                </div>
            </div>

        </div>

    </div>
    <!-- end Page Content -->

@endsection
