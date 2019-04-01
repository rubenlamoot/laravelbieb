@extends('layouts.admin')

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
    <p>Created : {{$user->created_at}}</p>
    <p>Updated : {{$user->updated_at}}</p>

    <h2>Ontleningen :</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Boek</th>
            <th scope="col">Datum uit</th>
            <th scope="col">Datum in</th>
        </tr>
        </thead>
        <tbody>

            @foreach($user->rentals as $rental)
                <tr>
                    <td>{{$rental->id}}</td>
                    <td>{{$rental->book->title}}</td>
                    <td>{{$rental->book_out}}</td>
                    <td>{{$rental->book_in}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

@stop
