<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('posts.index', compact('posts'));
    }
    //
    public function show($slug)
    {
        $post = Post::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // dd($post);
        return view('posts.show', compact('post'));
    }
}
