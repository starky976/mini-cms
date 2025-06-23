<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // public function index() {}
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()
            ->where('status', 'published')
            ->latest('created_at')
            ->paginate(10);

        return view('categories.show' , compact('category', 'posts'));
    }
}
