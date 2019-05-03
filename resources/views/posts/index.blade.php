
@extends("layouts.app")

@section("content")

    <h2>Posts</h2>
    <hr>
    @if(count($posts) > 0)

        @foreach($posts as $post)
            <h3><a href="./posts/{{$post->id}}"> {{$post->title}}</a></h3>
            <p class="text-xl-left d-block w-50 float-left">Created by {{$post->user->name}} at:</p>
            <p class="text-xl-right d-block w-50 float-left">{!!$post->created_at!!}</p>
            <br />
{{--            <p>{!!$post->body!!}</p>--}}
            <hr>
        @endforeach
        {{$posts->links()}}


    @else
        <h3>No posts</h3>
    @endif


@endsection