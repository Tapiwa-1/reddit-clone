<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class PostCommentController extends Controller
{
    //
    public function store($community_slug, Post $post)
    {
        # code...
        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => FacadesRequest::input(key: 'content'),
        ]);

        return back();
    }
}
