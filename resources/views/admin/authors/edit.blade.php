@extends('layouts.admin')

@section('content')
    <h1>Een auteur wijzigen / verwijderen</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::model($author,['method' => 'PATCH', 'action' => ['AdminAuthorsController@update', $author->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Naam van auteur:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Wijzig auteur', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminAuthorsController@destroy', $author->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Verwijder auteur', ['class' => 'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}

            @include('includes.form-error')
        </div>
    </div>

@stop
