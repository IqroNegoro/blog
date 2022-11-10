<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.tags.index", [
            "title" => "Post Tags",
            "tags" => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tags.create", [
            "title" => "Create New Tag"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:255",
            "color" => "required|max:255"
        ]);

        if (Tag::create($data)) {
            return redirect("administrator/tags")->with("success", "Success Create New Tag");
        }
        return redirect("administrator/tags")->with("error", "Error Create New Tag");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view("admin.tags.edit", [
            "title" => "Edit tag",
            "tag" => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $rules = [
            "color" => "required"
        ];

        if ($request->name != $tag->name) {
            $rules["name"] = "required|unique:tags";
        }
    
        $data = $request->validate($rules);

        if ($tag->update($data)) {
            return redirect("administrator/tags")->with("success", "Success Edit Tag");
        }
        return redirect("administrator/tags")->with("error", "Error Edit Tag");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            return redirect("administrator/tags")->with("success", "Success Delete Tag");
        }
        return redirect("administrator/tags")->with("error", "Error Delete Tag");
    }
}
