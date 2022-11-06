<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view("index", [
            "title" => "Mini Blog",
            "posts" => Post::with(["user", "comment", "tag.tag"])->wherePublished("Y")->get()
        ]);
    }
}
