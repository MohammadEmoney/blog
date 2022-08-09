<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::published()->latest()->paginate();
        $backgroundImage = 'front/assets/img/home-bg-2.jpg';
        return view('front.index', compact('posts', 'backgroundImage'));
    }
}
