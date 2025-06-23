@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <article class="bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
        <p class="text-sm text-gray-600 mb-4">
            {{ $post->published_at }} | カテゴリ:
            <a href="{{ route('category.show', $post->category->slug) }}" class="text-blue-500 hover:underline">
                {{ $post->category->name }}
            </a>
        </p>

        <div class="prose max-w-none">
            {!! nl2br(e($post->body)) !!}
        </div>
    </article>
@endsection
