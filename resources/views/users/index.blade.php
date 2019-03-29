@extends('layouts.user')

@section('content')
    <h1>Gegevens van {{$user->name}}</h1>

    <p>Email : {{$user->email}}</p>
    <p>Voornaam : {{$user->first_name}}</p>
    <p>Familienaam : {{$user->last_name}}</p>
    <p>Rijksregisternummer : {{$user->insurance_nr}}</p>
    @foreach ($user->addresses as $address)
        <p>Straat : {{$address->street}}</p>
        <p>Huisnummer : {{$address->house_nr}}</p>
        <p>Busnummer : {{$address->bus_nr}}</p>
        <p>Postcode : {{$address->postal_code}}</p>
        <p>Stad : {{$address->city}}</p>
    @endforeach

@stop
