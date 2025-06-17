<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'postCount' => Post::count(),
            'draftCount' => Post::where('status', 'draft')->count(),
            'userCount' => User::count(),
            'categoryCount' => Category::count(),
        ]);
    }
}
