<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->latest('created_at')
            ->take(5)
            ->get();

        $categories = Category::all();

        return view('index', compact('posts', 'categories'));
    }
}
