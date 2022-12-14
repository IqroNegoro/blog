<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.comments.index", [
            "title" => "Manage Comments Post",
            "comments" => Comment::with(["post", "user", "replies"])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view("admin.comments.replies", [
            "title" => "Replies $comment->comment",
            "replies" => Comment::with(["post", "user", "replied"])->where("parent_id", $comment->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if ($request->has('published')) {
            if ($comment->update(['published' => $request->published == 'N' ? 'N' : 'Y', 'published_at' => date('Y-m-d', strtotime(now()))])) {
                return back()->with('success', $request->published == 'N' ? 'Success Unpublishing Comment' : 'Success Publishing Comment');
            }
            return back()->with('error', 'Error, Try Again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if ($comment->delete()) {
            return back()->with("success", "Success Delete Comment");
        }
        return back()->with("error", "Error Delete Comment");
    }
}
