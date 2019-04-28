@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, tempora.</p>
        <p>
            <a href="./login" class="btn btn-primary btn-lg">Login</a>
            <a href="./register" class="btn btn-dark btn-lg">Register</a>
        </p>
    </div>
@endsection