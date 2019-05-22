    @extends('layouts.admin')

@section('content')
    <h1>Alle ontleningen</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ontleend door</th>
            <th scope="col">Boek</th>
            <th scope="col">Datum uit</th>
            <th scope="col">Datum in</th>
        </tr>
        </thead>
        <tbody>
        @if ($rentals)
            @foreach($rentals as $rental)
                <tr>
                    <td>{{$rental->id}}</td>

                    <td><a href="{{route('users.show', $rental->user->id)}}">{{$rental->user->name}}</a></td>
                    
                    @if ($book = App\Book::where('id', '=', $rental->book_id)->exists())
                        <td>{{$rental->book->title}}</td>
                        @else
                        <td>Verwijderd boek</td>
                    @endif

                    <td>{{$rental->book_out}}</td>
                    <td>{{$rental->book_in}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
