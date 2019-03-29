@extends('layouts.admin')

@section('content')
    <h1>Een nieuw boek ingeven in de database</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminBooksController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author_id', 'Auteur') !!}
        {!! Form::select('author_id', [''=>'Choose options'] + $authors,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('isbn', 'Isbn-nummer:') !!}
        {!! Form::text('isbn', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published', 'Jaar van uitgave:') !!}
        {!! Form::text('published', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('edition', 'Editie:') !!}
        {!! Form::text('edition', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Beschrijving:') !!}
        {!! Form::textarea('description', null , ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('aantal', 'Aantal exemplaren:') !!}
        {!! Form::text('aantal', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Geef boek in', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
