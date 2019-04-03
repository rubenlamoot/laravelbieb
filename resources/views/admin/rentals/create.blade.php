@extends('layouts.admin')

@section('content')
    <h1>Een nieuwe ontlening ingeven</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminRentalsController@store']) !!}

            <div class="form-group">
                {!! Form::label('user_id', 'Gebruiker') !!}
                {!! Form::select('user_id', [''=>'Choose options'] + $users,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('book_id', 'Boek') !!}
                {!! Form::select('book_id', [''=>'Choose options'] + $books,null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Ontleen boek', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form-error')
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
