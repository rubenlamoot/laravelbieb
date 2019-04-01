@extends('layouts.admin')

@section('content')
    <h1>Binnenbrengen van boek : {{$rental->book->title}}</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::model($rental,['method' => 'PATCH', 'action' => ['AdminRentalsController@update', $rental->id]]) !!}

            <p>Boek uitgeleend op {{$rental->book_out}}</p>

            <div class="form-group">
                {!! Form::submit('Boek binnenbrengen', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form-error')
        </div>
    </div>
@stop
