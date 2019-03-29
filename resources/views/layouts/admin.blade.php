<!DOCTYPE html>
<html lang="nl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Openbare stadsbibliotheek Ieper - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('css/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('css/morris.css')}}" rel="stylesheet">

<!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Backend stadsbibliotheek Ieper</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{{url('/')}}"><i class="fa fa-dashboard fa-fw"></i> Frontend</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Gebruikers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('users.index')}}">Alle gebruikers</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Boeken<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('books.index')}}">Alle boeken</a>
                            </li>
                            <li>
                                <a href="{{route('books.create')}}">Nieuw boek</a>
                            </li>
                        </ul>
                    </li>

                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-envelope-square fa-fw"></i> Posts<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="">All Posts</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="">Create Posts</a>--}}
                            {{--</li>--}}

                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-comment fa-fw"></i> Comments<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                            {{--<li>--}}
                                {{--<a href="">All Comments</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                    {{--</li>--}}
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard van bibliothecaris {{ Auth::user()->name }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->



    @yield('content')


    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.min.js')}}"></script>
@yield('scripts')

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('js/metisMenu.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('js/raphael.min.js')}}"></script>
<script src="{{asset('js/morris.min.js')}}"></script>
<script src="{{asset('js/morris-data.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('js/sb-admin-2.js')}}"></script>


</body>

</html>
