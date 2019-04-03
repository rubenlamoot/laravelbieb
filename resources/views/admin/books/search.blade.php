@extends('layouts.user')

@section('content')
    <h1>Zoek een boek</h1>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="" method="post">
                <div class="form-group">
                    <label for="searchAuthor">Zoeken op auteur</label>
                    <input type="text" class="form-control" id="searchAuthor" placeholder="zoek op auteur">
                </div>
                <div class="form-group">
                    <label for="searchTitle">Zoeken op titel</label>
                    <input type="text" class="form-control" id="searchTitle" placeholder="zoek op titel">
                </div>
                <div class="form-group">
                    <label for="searchWords">Zoeken op auteur</label>
                    <input type="text" class="form-control" id="searchWords" placeholder="zoek op inhoud">
                </div>
                <button type="submit" class="btn btn-primary">Zoeken</button>
            </form>
        </div>
    </div>
@stop
