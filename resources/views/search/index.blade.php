@extends('layouts.app')

@section('content')
    <h1>検索結果：「{{ $keyword }}」</h1>

    @if ($posts->count())
        @foreach ($posts as $post)
            <div>
                <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
                <p>{{ Str::limit(strip_tags($post->body), 100) }}</p>
            </div>
        @endforeach

        {{ $posts->withQueryString()->links() }}
    @else
        <p>該当する記事は見つかりませんでした。</p>
    @endif
@endsection
