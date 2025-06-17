@extends('admin.layouts.app')

@section('title','投稿一覧')
@section('content')
    <div class="flex ">
        <h1 class="flex-1 block text-2xl font-semibold">投稿一覧</h1>
        <a class="flex-0 text-white bg-blue-700 hover:bg-blue-800  focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        href="{{route('admin.posts.create')}}">投稿追加</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
        @if (isset($posts))
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        タイトル
                    </th>
                    <th scope="col" class="px-6 py-3">
                        投稿者
                    </th>
                    <th scope="col" class="px-6 py-3">
                        カテゴリー
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ステータス
                    </th>
                    <th scope="col" class="px-6 py-3">
                        作成日
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route('admin.posts.edit', $post->id ) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            {{ $post->title}}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $post->user}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->category_id}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->status}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
