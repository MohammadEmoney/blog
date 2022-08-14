<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $backgroundImage = $post->image ? $post->image->src : null;
        return view('front.posts.show', compact('post', 'backgroundImage'));
    }
}
