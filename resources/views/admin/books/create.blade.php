@extends('layouts.admin')
@php
    $currentYear = date('Y');
@endphp
@section('content')
    <h1>Een nieuw boek ingeven in de database</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminBooksController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('author_id', 'Auteur') !!}
        {!! Form::select('author_id', [''=>'Kies een optie'] + $authors,null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('isbn', 'Isbn-nummer:') !!}
        {!! Form::text('isbn', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('published', 'Jaar van uitgave:') !!}
        {!! Form::selectRange('published', 1900, $currentYear,null, ['class' => 'form-control', 'placeholder' => 'Kies een optie']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('edition', 'Editie:') !!}
        {!! Form::select('edition', array('' => 'Kies een optie') + range(1, 20),null, ['class' => 'form-control']) !!}
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
        {!! Form::select('aantal', array('' => 'Kies een optie') + range(0,20),null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Geef boek in', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form-error')
@stop
