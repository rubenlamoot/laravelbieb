@extends('layouts.admin')

@section('content')
    <h1>Een nieuwe auteur aanmaken</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminAuthorsController@store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Naam van auteur:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Maak auteur aan', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form-error')
        </div>
    </div>




@stop
