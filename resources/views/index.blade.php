@extends('layouts.app')

@section('title', 'トップページ')

@section('content')

    <section class="bg-blue-600 text-white py-16 px-4 text-center rounded-lg mb-10">
        <h1 class="text-4xl font-bold mb-4">ようこそ、My CMSへ</h1>
        <p class="text-lg">最新のニュースやブログ記事をお届けします。</p>
    </section>


    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">新着記事</h2>

        @forelse ($posts as $post)
            <div class="mb-6 p-4 bg-white rounded shadow">
                <h3 class="text-xl font-bold">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </h3>
                <p class="text-sm text-gray-600">{{ $post->published_at }}</p>
                <p class="mt-2">{{ Str::limit(strip_tags($post->body), 100) }}</p>
            </div>
        @empty
            <p>投稿がまだありません。</p>
        @endforelse
    </section>


    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-4">カテゴリ一覧</h2>
        <div class="flex flex-wrap gap-2">
            @foreach ($categories as $category)
                <a href="{{ route('category.show', $category->slug) }}"
                   class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </section>

@endsection
