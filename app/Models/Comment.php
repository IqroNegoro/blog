<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function post() {
        return $this->belongsTo(Post::class, "post_id");
    }

    
    public function replied() {
        return $this->belongsTo(Comment::class, "parent_id", "id");
    }

    public function replies() {
        return $this->hasMany(Comment::class, "parent_id")->whereNotNull("parent_id")->whereHas("replied", function($replied) {
            $replied->where("published", "Y");
        });
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($comment) {
            $comment->replies->each->delete();
        });
    }
}
