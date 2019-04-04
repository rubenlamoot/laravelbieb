@extends('layouts.admin')

@section('content')
    <h1>Een boek ontlenen</h1>




    <div class="row">
        <div class="col-md-6">
            @if (session('alert'))
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
            @endif
        </div>
    </div>


@stop
