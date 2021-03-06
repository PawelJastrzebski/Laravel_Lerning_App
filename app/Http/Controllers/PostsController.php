<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ["except" => ["show", "index"]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby("created_at", 'desc')->paginate(2);
        $data = array(
            "posts" => $posts
        );
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            "cover_image" => 'image|nullable|max:1999'
        ]);

        // Handle File upload
        $fileNamtToStore = "no-image.png";
        if ($request->hasFile('cover_image')) {
            $fileName = $request->file("cover_image")->getFilename();
            $fielExt = $request->file("cover_image")->getClientOriginalExtension();
            $fileNamtToStore = $fileName . "_" . time() .".".$fielExt;
        }

        $path = $request->file("cover_image")->storeAs("public/cover_images", $fileNamtToStore);

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNamtToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', "Post Created");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** @var  boolean $canEdit */
        $canEdit = false;

        /** @var User $user */
        $user = User::find(Auth::id());
        $post = Post::find($id);


        if ($user != null) {
            $canEdit = $user->hasPost($post);
        }

        return view("posts.show")->with("post", $post)->with('canEdit', $canEdit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** @var Post $post */
        $post = Post::find($id);

        if (auth()->user()->id != $post->user->id) {
            return redirect()->action("DashBoardController@index")->with("error", "Can't edit this post");
        }


        return view("posts.edit")->with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/posts/' . $post->id)->with("success", "Post updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with("success", "Post was deleted");

    }
}
