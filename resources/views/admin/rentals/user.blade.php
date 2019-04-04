@extends('layouts.user')

@section('content')
    <h1>Mijn ontleningen :</h1>

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

        @foreach($rentals as $rental)
            <tr>
                <td>{{$rental->book->title}}</td>
                <td>{{$rental->book->author->name}}</td>
                <td>{{$rental->book_out}}</td>
                <td>@if ($rental->book_in == NULL)
                        {!! Form::open(['method'=>'PATCH', 'action'=>'AdminRentalsController@user_rent_back']) !!}

                        <input type="hidden" name="id" value="{{$rental->id}}">
                        <div class="form-group">
                            {!! Form::submit('Terug brengen', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    @else
                        {{$rental->book_in}}
                    @endif</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@stop
