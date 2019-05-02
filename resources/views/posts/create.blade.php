
@extends("layouts.app")

@section("content")

    <a href="../posts" class="btn btn-dark btn-sm">Show all Posts</a>
    <br />
    <br />
    <h2>Add Post</h2>
    <hr>
    {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST']) }}
        <class class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','', ['class' => 'form-control mb-3', 'placeholder' => "Title"])}}

            {{Form::label('body','Content')}}
            {{Form::textarea('body','', [ 'id'=> 'article-ckeditor','class' => 'form-control mb-3', 'placeholder' => "Post content"])}}

            {{Form::submit("Create Post", ['class'=> "mt-3 btn btn-primary"])}}
        </class>
    {{ Form::close() }}



@endsection