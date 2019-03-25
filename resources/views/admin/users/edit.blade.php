@extends('layouts.admin')

@section('content')
    <h1>Gegevens van een gebruiker wijzigen</h1>

    {!! Form::model($user,['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id]]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Gebruikersnaam') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('first_name', 'Voornaam') !!}
                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('last_name', 'Familienaam') !!}
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Rol') !!}
                {!! Form::select('role_id', [''=> 'Choose options'] + $roles, null , ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', array(1 => 'Actief', 0 => 'Niet actief'),null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('street', 'Straat') !!}
                {!! Form::text('street', $user->address->street, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('house_nr', 'Huisnummer') !!}
                {!! Form::text('house_nr', $user->address->house_nr, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('bus_nr', 'Busnummer') !!}
                {!! Form::text('bus_nr', $user->address->bus_nr, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('postal_code', 'Postcode') !!}
                {!! Form::text('postal_code', $user->address->postal_code, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city', 'Stad') !!}
                {!! Form::text('city', $user->address->city, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Gebruiker wijzigen', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@stop
