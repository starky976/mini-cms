<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use App\Enums\PostStatus;

class PostController extends Controller
{
    /**
     * 投稿一覧
     */
    public function index()
    {
        $posts = Post::with([
                'user',
                'category'
            ])->orderByDesc('created_at')
            ->paginate(10);
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
        $users = User::where('role','editor')->get();
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
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'body' => 'required|string',
            'status' => ['required', new Enum(PostStatus::class)],
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);
        Post::create($validated);
        return redirect()->route('admin.posts.index')->with('success', '記事を作成しました');
    }

    /**
     * 編集フォーム表示
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $users = User::where('role','editor')->get();
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
            'status' => ['required', new Enum(PostStatus::class)],
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);
        // dd($validated);
        $post->update($validated);
        return redirect()->route('admin.posts.index')->with('success', '記事を更新しました');
    }

    /**
     * 削除処理
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', '記事を削除しました');
    }
}
