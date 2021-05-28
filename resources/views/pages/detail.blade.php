@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('layout.menu')

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <h1>{{ $news->name }}</h1>

                <img class="img-responsive" src="{{asset('uploads/news/' . $news->image)}}">
                <hr>

                <p class="lead">
                    {!! $news->desc !!}
                </p>

                <p>
                    {!! $news->content !!}
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::user())
                    <div class="well">
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $err)
                                <div class="alert alert-danger" style="margin-top: 1em;">
                                    <strong>{{ $err }}</strong><br/>
                                </div>
                            @endforeach
                        @endif

                        @if(session('message'))
                            <div class="alert alert-success">
                                <strong>{{ session('message') }}</strong>
                            </div>
                        @endif
                        <form role="form" method="POST" action="{{route('comment.customer', $news->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="contents" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                @endif

                <hr>

                @foreach($news->Comment as $comment)
                <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img width="100px" class="media-object" src="uploads/users/{{$comment->user->image}}" alt="">
                        </a>
                        <div class="media-body">
                            {{ $comment->contents }}
                        </div>
                    </div>
                @endforeach


            </div>




            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
