@extends('layouts.user')

@section('content')
    <h1>Mijn openstaande ontleningen die te laat binnen zijn</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Boek</th>
            <th scope="col">Auteur</th>
            <th scope="col">Datum uit</th>
            <th scope="col">Datum in</th>
        </tr>
        </thead>
        <tbody>
        @if($rentals)
            @foreach($rentals as $rental)
                <tr>
                    @if ($book = App\Book::where('id', '=', $rental->book_id)->exists())
                        <td>{{$rental->book->title}}</td>
                    @else
                        <td>Verwijderd boek</td>
                    @endif
                    <td>{{$rental->book->author->name}}</td>
                    <td>{{$rental->book_out}}</td>
                    <td>boete</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
