@extends('layouts.user')

@section('content')
    <h1>Zoekresultaten</h1>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @if($books)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Titel</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Korte Inhoud</th>
                        <th scope="col">Ontlenen</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author->name}}</td>
                            <td>{{$book->description}}</td>
                            <td><a href="{{route('books.book_detail',$book->id)}}">Ontleen</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        {{$books->links()}}
                    </div>
                </div>
            @else
                <h2>Geen resultaten gevonden</h2>
            @endif

        </div>
    </div>
@stop
