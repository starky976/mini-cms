@extends('layouts.app')
@section('title', '検索結果')

@section('content')
<h1 class="text-2xl font-semibold mb-4">検索結果：{{ $keyword }}</h1>
@if ($posts->count())
    <div class="space-y-4">
        @foreach ($posts as $post)
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-xl font-bold">
                    <a href="{{ route('posts.show', $post->slug) }}" class="text-blue-600 hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-sm text-gray-600">{{ $post->published_at }}</p>
                <p>{{ Str::limit(strip_tags($post->body), 100) }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $posts->withQueryString()->links() }}
    </div>
@else
    <p class="text-gray-600">検索結果が見つかりませんでした。</p>
@endif
@endsection
