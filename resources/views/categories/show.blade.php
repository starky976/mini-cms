@extends('layouts.app')

@section('title', $category->name . ' の記事')

@section('content')
    <h1 class="text-2xl font-bold mb-6">{{ $category->name }} の記事一覧</h1>

    @forelse ($posts as $post)
        <div class="mb-6 bg-white p-4 rounded shadow">
            <h2 class="text-xl font-semibold">
                <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline">
                    {{ $post->title }}
                </a>
            </h2>
            <p class="text-sm text-gray-600">{{ $post->published_at }}</p>
            <p class="mt-2">{{ Str::limit(strip_tags($post->body), 100) }}</p>
        </div>
    @empty
        <p class="text-gray-600">このカテゴリに記事はありません。</p>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
