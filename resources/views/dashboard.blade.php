@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5 class="d-inline">Create post</h5>
                        <a href="/posts/create" class="btn btn-success btn-sm d-inline float-right">Create</a>
                        <hr/>
                        <h5>My Posts</h5>
                        <br/>
                        @if(count($myPosts) > 0)

                            @foreach($myPosts as $post)
                                <h4><a href="./posts/{{$post->id}}"> {{$post->title}}</a></h4>
                                <p class="text-xl-left d-block w-50 float-left">Created at:</p>
                                <p class="text-xl-right d-block w-50 float-left">{!!$post->created_at!!}</p>
                                <br />
                                <hr>
                            @endforeach
                        @else
                            <br/>
                            <h5>You don't have any posts</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
