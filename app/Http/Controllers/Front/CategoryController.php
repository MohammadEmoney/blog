<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate();
        return view('front.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $category->load('posts');
        return view('front.categories.show', compact('category'));
    }
}
