<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    use HasFactory;

    public function tag() {
        return $this->belongsTo(Tag::class, "tag_id");
    }

    public function post() {
        return $this->belongsToMany(Post::class, "tag_id");
    }
}
