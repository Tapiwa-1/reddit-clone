<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'post_id',
        'content',
    ];

    public function post()
    {
        # code...
        return $this->belongsTo(Post::class); // this comment belongs to one and only post
    }
    public function user()
    {
        return $this->belongsTo(User::class); // this comment belongs to one and only user
    }
}
