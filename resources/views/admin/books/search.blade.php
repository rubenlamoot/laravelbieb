@extends('layouts.user')

@section('content')
    <h1>Zoek een boek</h1>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            {!! Form::open(['method' => 'GET', 'action' => 'FrontController@search']) !!}

            <div class="form-group">
                {!! Form::label('searchAuthor', 'Zoeken op auteur:') !!}
                {!! Form::text('searchAuthor', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('searchTitle', 'Zoeken op titel:') !!}
                {!! Form::text('searchTitle', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('searchWords', 'Zoeken op woorden:') !!}
                {!! Form::text('searchWords', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Zoeken', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
