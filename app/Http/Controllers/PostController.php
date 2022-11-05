<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("posts.index", [
            "title" => "Me",
            "posts" => Post::where("user_id", auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create", [
            "title" => "Create New Post"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "image" => "required|image",
            "title" => "required|max:255",
            "excerpt" => "required|max:100",
            "slug" => "required",
            "body" => "required"
        ]);

        $data["user_id"] = auth()->user()->id;
        $data["image"] = $request->file("image")->store("/images", "public");

        if (Post::create($data)) {
            return redirect('me/posts')->with("success", "Success Create Post");
        }
        return redirect('me/posts')->with("error", "Error Create Post");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("post", [
            "title" => $post->title,
            "post" => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->has("published")) {
            if ($post->update(["published" => $request->published == "N" ? "N" : "Y", "published_at" => date("Y-m-d", strtotime(now()))])) {
                return back()->with("success", $request->published == "N" ? "Success Unpublishing News" : "Success Publishing News");
            }
            return back()->with("error", "Error, Try Again");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return back()->with("success", "Success Delete Post");
        }
        return back()->with("error", "Error Delete Post");
    }

    public function getSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json($slug, 200);
    }
}
