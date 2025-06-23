<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
/**
     * 検索結果表示
     */
    public function index(Request $request)
    {
        $keyword = $request->input('q');
        $query = Post::query()->where('status', 'published');
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('body', 'like', "%{$keyword}%");
            });
        }
        $posts = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('search.index', compact('posts', 'keyword'));
    }
}
