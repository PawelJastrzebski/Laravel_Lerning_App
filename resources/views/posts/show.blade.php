
@extends("layouts.app")

@section("content")

    @if($post)
    {{ Form::open(['action' => ['PostsController@destroy',$post->id], 'method' => 'POST']) }}
    <a href="../posts" class="btn btn-light btn-sm">Back</a>
    @if($canEdit)
    <a href="../posts/{{$post->id}}/edit" class="btn btn-success btn-sm">Edit</a>
    {{Form::hidden("_method","DELETE")}}
    {{Form::submit("Delete Post", ['class'=> " btn btn-danger btn-sm"])}}
    @endif
    {{ Form::close() }}
    @else
        <a href="../posts" class="btn btn-light btn-sm">Back</a>
    @endif
    <br />
    <br />
    <h2>Post</h2>
    <hr>
    @if($post)
        <div class="well">
            <div class="row">
                <div class="col-md-4 col-sm-4 d-flex">
                    <img style="margin: auto; max-width: 100%; max-height: 200px" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                </div>
                <div class="col-md-8 col-sm-8">
                    <h3>{{$post->title}}</h3>
                    <p>{!!$post->body!!}</p>
                    <small>Written on{{$post->created_at}}</small>
                </div>
            </div>

            <hr>
        </div>

    @else
        <h3>Post not exist</h3>
    @endif



@endsection