<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * 投稿一覧
     */
    public function index()
    {
        $posts = Post::with('category','user')->
                latest()->paginate(10);
        // dd($posts);
        return view('admin.posts.index',[
            'posts' => $posts
        ]);
    }

    /**
     * 作成フォーム表示
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.create', [
            'categories' => $categories,
            'users' => $users
        ]);
    }

    /**
     * 保存処理
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'body' => 'required|string',
            'status' => 'required|in:draft,published',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
            // 'published_at' => 'nullable|date',
        ]);
        dd($validated);
        // Post::create($validated);

        return redirect()->route('admin.posts.index')->with('success', '記事を作成しました');
    }

    /**
     * 編集フォーム表示
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.edit', compact('post', 'categories', 'users'));
    }

    /**
     * 更新処理
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
        ]);
        $post->update($validated);
        return redirect()->route('admin.posts.index')->with('success', '記事を更新しました');
    }

    /**
     * 削除処理
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', '記事を削除しました');
    }
}
