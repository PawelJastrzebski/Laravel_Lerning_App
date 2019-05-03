<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var int $user_id */
        $user_id = auth()->user()->id;

        /** @var User $user */
        $user = User::find($user_id);


        return view('dashboard')->with('myPosts',$user->posts)->with('success',json_encode($user->posts()));
    }
}
