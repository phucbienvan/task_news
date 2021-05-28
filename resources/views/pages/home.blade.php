@extends('layout.index')
@section('content')
<div class="container">

    <!-- slider -->
@include('layout.slide')
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
       @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                    <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->

                    <div class="row-item row">


                        <div class="col-md-8 border-right">
                            @foreach($news as $item)
                            <div class="col-md-5">
                                <a href="news/{{$item->id}}">
                                    <img class="img-responsive" src="uploads/news/{{$item->image}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <h3>{{$item->name}}</h3>
                                <p>{{$item->desc}}</p>
                                <a class="btn btn-primary" href="{{route('detail', $item->id)}}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            @endforeach

                        </div>
                        @foreach($newsOrther as $item)

                        <div class="col-md-4">
                            <a href="{{route('detail', $item->id)}}">
                                <h4>
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    {{$item->desc}}
                                </h4>
                            </a>

                        </div>
                        @endforeach

                        <div class="break"></div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection
