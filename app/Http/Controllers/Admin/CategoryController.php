<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index',[
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required',
            'description' => 'string'
        ]);
        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'カテゴリを作成しました');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string',
            'description' =>'string'
        ]);
        $category->update($validated);
        return redirect()->route('admin.categories.index')->with('success', 'カテゴリを更新しました');
    }

    // //
    // public function destroy(Category $category)
    // {
    //     $category->delete();
    //     return redirect()->route('adcategories.index')->with('success', 'カテゴリを削除しました');
    // }



}
