<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ["id"];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function tag() {
        return $this->belongsToMany(TagPost::class, Tag::class);
    }
    //tag error

    public function comment() {
        return $this->hasMany(Comment::class, "post_id")->whereNull("parent_id");
    }

    public function getRouteKeyName() {
        return "slug";
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
