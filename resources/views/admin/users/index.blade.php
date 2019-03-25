@extends('layouts.admin')

@section('content')
    <h1>Alle gebruikers</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Gebruikersnaam</th>
            <th scope="col">E-mail</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Familienaam</th>
            <th scope="col">Rijksregisternummer</th>
            <th scope="col">Actief</th>
            <th scope="col">Rol</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
            @if ($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->insurance_nr}}</td>
                        <td>{{$user->is_active == 1 ? 'Actief' : 'Niet Actief'}}</td>
                        <td>{{$user->role_id ? $user->role->name : 'gebruiker zonder rol'}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop
