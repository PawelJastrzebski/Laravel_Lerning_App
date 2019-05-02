@extends("layouts.app")

@section("content")

    <a href="/posts" class="btn btn-dark btn-sm">Show all Posts</a>
    <br/>
    <br/>
    @if($post)
        <h2>Edit Post</h2>
        <hr>
        {{ Form::open(['action' => ['PostsController@update',$post->id], 'method' => 'PUT']) }}
        <class class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title, ['class' => 'form-control mb-3', 'placeholder' => "Title"])}}

            {{Form::label('body','Content')}}
            {{Form::textarea('body',$post->body,[ 'id'=> 'article-ckeditor','class' => 'form-control mb-3', 'placeholder' => "Post content"])}}

            {{Form::submit("Save Changes", ['class'=> "mt-3 btn btn-primary"])}}
            <a href="/posts/{{$post->id}}/edit" class="mt-3 btn btn-danger">Reset</a>
        </class>
        {{ Form::close() }}
    @else
        <h2>Post not exist</h2>
        <a href="/posts" class="btn btn-dark btn-sm">Back to Posts</a>
    @endif


@endsection