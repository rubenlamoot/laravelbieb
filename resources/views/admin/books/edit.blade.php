@extends('layouts.admin')
@php
    $currentYear = date('Y');
@endphp
@section('content')
    <h1>Een boek wijzigen</h1>

    {!! Form::model($book,['method' => 'PATCH', 'action' => ['AdminBooksController@update', $book->id], 'files' => true]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('title', 'Titel:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('author_id', 'Auteur:') !!}
                {!! Form::select('author_id', [''=> 'Choose options'] + $authors, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('isbn', 'ISBN-nr:') !!}
                {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('published', 'Uitgavejaar:') !!}
                {!! Form::selectRange('published', $currentYear, 1900, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('edition', 'Editie:') !!}
                {!! Form::text('edition', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('aantal', 'Aantal:') !!}
                {!! Form::select('aantal', array('' => 'Kies een optie') + range(0,20),null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Beschrijving:') !!}
                {!! Form::textarea('description', null , ['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="col-md-6">
            <div style="margin-bottom: 20px">
                <img class="img-fluid" src="{{$book->photo ? asset('images/' .$book->photo->filename) : 'http://place-hold.it/400x400'}}" alt="">
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Foto:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Boek wijzigen', ['class' => 'btn btn-primary my-3']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminBooksController@destroy', $book->id]]) !!}
    <div class="form-group">
        <p>Boek wordt echt verwijderd!!!!</p>
        {!! Form::submit('Verwijder boek', ['class' => 'btn btn-danger']) !!}
    </div>

    {!! Form::close() !!}

    @include('includes.form-error')
@stop
