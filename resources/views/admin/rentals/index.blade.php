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
                    <td>{{$rental->book->title}}</td>
                    <td>{{$rental->book_out}}</td>
                    <td>@if ($rental->book_in == NULL)
                        <a href="{{route('rentals.edit', $rental->id)}}" class="btn btn-success">Terug brengen</a>
                        @else
                        {{$rental->book_in}}
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
