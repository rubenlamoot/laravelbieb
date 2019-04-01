@extends('layouts.admin')

@section('content')
    <h1>Alle auteurs</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Naam</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if ($authors)
            @foreach($authors as $author)
                <tr>
                    <td><a href="{{route('authors.edit', $author->id)}}">{{$author->id}}</a></td>
                    <td>{{$author->name}}</td>
                    <td>{{$author->created_at}}</td>
                    <td>{{$author->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-12">
            {{$authors->links()}}
        </div>
    </div>
@stop
