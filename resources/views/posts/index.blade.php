@extends('layouts.app')

@section('title', '記事一覧')

@section('content')
    <h1 class="text-2xl font-bold mb-6">記事一覧</h1>

    @foreach ($posts as $post)
        <div class="mb-6 bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-sm text-gray-600">{{ $post->published_at }}・カテゴリ: {{ $post->category->name }}</p>
            <p class="mt-2">{{ Str::limit(strip_tags($post->body), 100) }}</p>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
