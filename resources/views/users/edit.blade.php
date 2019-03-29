@extends('layouts.user')

@section('content')
    <h1>Gegevens wijzigen van {{$user->name}}</h1>

    {!! Form::model($user,['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
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
                {!! Form::label('password', 'Paswoord (Indien je dit niet wil wijzigen laat het dan leeg)') !!}
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

        </div>

        <div class="col-md-6">
            @foreach($user->addresses as $address)
                <div class="form-group">
                    {!! Form::label('street', 'Straat') !!}
                    {!! Form::text('street', $address->street, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('house_nr', 'Huisnummer') !!}
                    {!! Form::text('house_nr', $address->house_nr, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('bus_nr', 'Busnummer') !!}
                    {!! Form::text('bus_nr', $address->bus_nr, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('postal_code', 'Postcode') !!}
                    {!! Form::text('postal_code', $address->postal_code, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'Stad') !!}
                    {!! Form::text('city', $address->city, ['class' => 'form-control']) !!}
                </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Gegevens wijzigen', ['class' => 'btn btn-primary my-3']) !!}
    </div>
    {!! Form::close() !!}
@stop
