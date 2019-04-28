@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum, tempora.</p>

    @if(count($tech) > 0)
        <h4>Technologies</h4>
        <ol class="list-group">
            @foreach($tech as $item)
                <li class="list-group-item">{{$item}}</li>
            @endforeach
        </ol>
    @endif

@endsection