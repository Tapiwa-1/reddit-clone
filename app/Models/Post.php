<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [

        'user_id',
        'community_id',
        'title',
        'slug',
        'description',
        'url',
        'votes'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        # code...
        return $this->belongsTo(User::class); // This post belongs to one user
    }
    public function comments()
    {
        # code...
        return $this->hasMany(Comment::class); //This post has many comments
    }
    public function community()
    {
        # code...
        return $this->belongsTo(Community::class); //This post belongs to one and only community
    }
    public function postVotes()
    {
        return $this->hasMany(PostVote::class); //This post has many votes
    }
}
