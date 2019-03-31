@extends('layouts.admin')

@section('content')
    <h1>Een boek wijzigen</h1>

    {!! Form::model($book,['method' => 'PATCH', 'action' => ['AdminBooksController@update', $book->id], 'files' => true]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('title', 'Titel:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('author_id', 'Auteur:') !!}
                {!! Form::select('author_id', [''=> 'Choose options'] + $authors, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('isbn', 'ISBN-nr:') !!}
                {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('published', 'Uitgavejaar:') !!}
                {!! Form::text('published', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('edition', 'Editie:') !!}
                {!! Form::text('edition', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('aantal', 'Aantal:') !!}
                {!! Form::text('aantal', null , ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Beschrijving:') !!}
                {!! Form::textarea('description', null , ['class' => 'form-control']) !!}
            </div>

        </div>

        <div class="col-md-6">
            <div style="margin-bottom: 20px">
                <img class="img-fluid" src="{{$book->photo ? asset('images/' .$book->photo->filename) : 'http://place-hold.it/400x400'}}" alt="">
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Foto:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Boek wijzigen', ['class' => 'btn btn-primary my-3']) !!}
    </div>
    {!! Form::close() !!}

@stop
