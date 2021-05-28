
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tin Tức</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li>
                    <a href="{{route('contact')}}">Liên hệ</a>
                </li>
            </ul>


            <ul class="nav navbar-nav pull-right">

                @if(Auth::user() )

                    <li>
                        <a href="customer"><span class ="glyphicon glyphicon-user"></span>
                            {{Auth::user()->name}}</a>
                    </li>
                    <li>
                        <a href="{{route('logout.customer')}}">Đăng xuất</a>

                    </li>
                @else

                    <li>
                        <a href="{{route('register.customer')}}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{route('login.customer')}}">Đăng nhập</a>
                    </li>

                @endif

            </ul>
        </div>



        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
