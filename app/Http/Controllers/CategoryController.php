<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // public function index() {}
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->findOrFail();
        $posts = $category->posts()
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(20);

        return view('categories.show' , compact('category', 'posts'));
    }
}
