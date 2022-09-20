<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Community extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'slug',
    ];

    public function sluggable(): array
    {

        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {

        return $this->hasMany(Post::class); //one community has many posts
    }
}
