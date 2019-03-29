@extends('layouts.admin')

@section('content')
    <h1>Alle boeken</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Titel</th>
            <th scope="col">Auteur</th>
            <th scope="col">Isbn</th>
            <th scope="col">Uitgavejaar</th>
            <th scope="col">Uitgave</th>
            <th scope="col">Aantal</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if ($books)
            @foreach($books as $book)
                <tr>
                    <td><a href="{{route('books.edit', $book->id)}}">{{$book->id}}</a></td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author->name}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->published}}</td>
                    <td>{{$book->edition}}</td>
                    <td>{{$book->aantal}}</td>
                    <td>{{$book->created_at}}</td>
                    <td>{{$book->updated_at}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <div class="row">
        <div class="col-12">
            {{$books->links()}}
        </div>
    </div>
@stop
