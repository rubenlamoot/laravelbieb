@extends('layouts.user')

@section('content')
    <h1>Een boek ontlenen</h1>

<div class="row">
    <div class="col-md-6">
        <p>Titel : {{$book->title}}</p>
        <p>Auteur : {{$book->author->name}}</p>
        <p>Jaar van uitgave : {{$book->published}}</p>
        <p>Editie : {{$book->edition}}</p>
        <p>Korte inhoud : {{$book->description}}</p>

        {!! Form::open(['method'=>'POST', 'action'=>'AdminRentalsController@user_rent']) !!}

        <input type="hidden" name="book_id" value="{{$book->id}}">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

        <div class="form-group">
            {!! Form::submit('Ontleen boek', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-md-6">
        <div style="margin-bottom: 20px">
            <img class="img-fluid" src="{{$book->photo ? asset('images/' .$book->photo->filename) : 'http://place-hold.it/400x400'}}" alt="">
        </div>

    </div>
</div>



    <div class="row">
        <div class="col-md-6">
            @if (session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
            @endif
        </div>
    </div>


@stop
