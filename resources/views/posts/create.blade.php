
@extends("layouts.app")

@section("content")

    <a href="../posts" class="btn btn-dark btn-sm">Show all Posts</a>
    <br />
    <br />
    <h2>Add Post</h2>
    <hr>
    {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST', "enctype"=> "multipart/form-data"]) }}
        <class class="form-group ">
            {{Form::label('title','Title')}}
            {{Form::text('title','', ['class' => 'form-control mb-3', 'placeholder' => "Title"])}}

            {{Form::label('body','Content')}}
            {{Form::textarea('body','', [ 'id'=> 'article-ckeditor','class' => 'form-control mb-3', 'placeholder' => "Post content"])}}
            <div class="form-group my-3">
                {{Form::label('cover_image','Select file')}}
                {{Form::file("cover_image", ["title" => "Select image", 'class' => 'form-control-file', "id" => "file-button" ])}}
            </div>
            {{Form::submit("Create Post", ['class'=> "my-3 btn btn-primary"])}}

        </class>
    {{ Form::close() }}



@endsection