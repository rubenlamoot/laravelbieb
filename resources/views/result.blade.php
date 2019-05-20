

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Openbare stadsbibliotheek Ieper</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/cssfront/bootstrap.min.css')}}">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 45px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 45px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Openbare stadsbibliotheek Ieper
        </div>
              <h1>Zoekresultaten</h1>
                    @if($books)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Titel</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Korte Inhoud</th>
                                <th scope="col">Ontlenen</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book->title}}</td>
                                    <td>{{$book->author->name}}</td>
                                    <td>{{$book->description}}</td>
                                    <td><a @auth href="{{route('books.book_detail',$book->id)}}" @else href="{{route('login')}}" @endauth>Ontleen</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif


    </div>
</div>

<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{asset('js/jsfront/jquery-3.3.1.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('js/jsfront/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('js/jsfront/bootstrap.min.js')}}"></script>
</body>
</html>
