<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);
Route::get('/search', [SearchController::class, 'index']);

// 管理画面ルート（ログインが必要）
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/posts', AdminPostController::class)->only([
        'index','create','store','edit','update','delete'
    ]);
    Route::resource('/categories', AdminCategoryController::class)->only([
        'index','create','store','edit','update'
    ]);
    Route::resource('/users', AdminUserController::class)->only([
        'index','create','store','edit','update'
    ]);
    // ->middleware('can:admin');

    // phase2
    Route::resource('/media', AdminSettingsController::class)->only([
        'index'
    ]);
    Route::resource('/setting', AdminMediaController::class)->only([
        'index'
    ]);
});

require __DIR__.'/auth.php';
