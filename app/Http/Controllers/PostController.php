<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\TagPost;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            'title' => 'Me',
            'posts' => Post::with(["user", "tag"])->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create', [
            'title' => 'Create New Post',
            'tags' => Tag::all(),
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
            'image' => 'required|image',
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'tags' => 'required',
        ]);

        
        $data['user_id'] = auth()->user()->id;
        $data['image'] = $request->file('image')->store('/images', 'public');
        
        if (Post::create($data)) {
            $tags = [];
    
            foreach (explode(",", $request->tags[0]) as $tag) {
                array_push($tags, [
                    'post_id' => Post::latest()->first()->id,
                    'tag_id' => $tag,
                ]);
            }

            TagPost::insert($tags);

            return redirect('me/posts')->with('success', 'Success Create Post');
        }
        return redirect('me/posts')->with('error', 'Error Create Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post', [
            'title' => $post->title,
            'post' => $post,
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
        return view('posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'tags' => Tag::all(),
        ]);
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
        if ($request->has('published')) {
            if ($post->update(['published' => $request->published == 'N' ? 'N' : 'Y', 'published_at' => date('Y-m-d', strtotime(now()))])) {
                return back()->with('success', $request->published == 'N' ? 'Success Unpublishing News' : 'Success Publishing News');
            }
            return back()->with('error', 'Error, Try Again');
        }

        $rules = [
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required',
            'tags' => 'required',
        ];

        if ($request->has('image')) {
            $rules['image'] = 'required|image';
            Storage::disk("public")->delete($post->image);
        }

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $data = $request->validate($rules);

        $tags = [];

        foreach (explode(",", $request->tags[0]) as $tag) {
             array_push($tags, [
                'post_id' => $post->id,
                'tag_id' => $tag,
            ]);
        }

        foreach ($post->tag as $tag) {
            $tag->delete();
        }
        
        $data['user_id'] = auth()->user()->id;

        if ($request->has('image')) {
            $data['image'] = $request->file('image')->store('/images', 'public');
        }

        if (Post::find($post->id)->update($data) && TagPost::insert($tags)) {
            return redirect('me/posts')->with('success', 'Success Create Post');
        }
        return redirect('me/posts')->with('error', 'Error Create Post');
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
            Storage::disk('public')->delete($post->image);
            return back()->with('success', 'Success Delete Post');
        }
        return back()->with('error', 'Error Delete Post');
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json($slug, 200);
    }
}
