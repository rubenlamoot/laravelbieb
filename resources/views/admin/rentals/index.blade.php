@extends('layouts.admin')

@section('content')
    <h1>Alle ontleningen</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Onteend door</th>
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
                    <td>{{$rental->user->name}}</td>
                    <td>{{$rental->book->title}}</td>
                    <td>{{$rental->book_out}}</td>
                    <td>{{$rental->book_in}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
