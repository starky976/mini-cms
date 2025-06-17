@extends('admin.layouts.app')

@section('title','カテゴリー編集')
@section('content')
    <div class="flex">
        <h1 class="flex-1 block text-2xl font-semibold">カテゴリー編集</h1>
    </div>
    <div class="flex">
        <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control my-4">
                <label for="name" class="label">
                    <span class="label-text">名前:</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border-red-500 @else border-gray-300 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control my-4">
                <label for="slug" class="label">
                    <span class="label-text">スラッグ:</span>
                </label>
                <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('slug') border-red-500 @else border-gray-300 @enderror">
                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control my-4">
                <label for="description" class="label">
                    <span class="label-text">説明:</span>
                </label>
                <input type="text" name="description" value="{{ old('description', $category->description) }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('description') border-red-500 @else border-gray-300 @enderror">
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0 mt-8">
                <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">更新</button>
                </div>
            </div>
        </form>
    </div>
@endsection
