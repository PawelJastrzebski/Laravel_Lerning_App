<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Welcome Page";
        return view("pages.index")->with('title',$title);
    }

    public function about(){

        $data = array(
            'title' => "About",
            "tech" => ['CSS',"HTML","PHP"]
        );

        return view("pages.about")->with($data);
    }
    public function services(){
        return view("pages.services");
    }
}
