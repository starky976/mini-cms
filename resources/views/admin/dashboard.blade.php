@extends('admin.layouts.app')

@section('title','ダッシュボード')

@section('content')
    <h1 class="block text-2xl font-semibold">ダッシュボード</h1>

    <div class="mt-10 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
        <section class="bg-white p-5 rounded">
            <h2 class="section-title text-xl font-semibold">投稿一覧</h2>
            <div class="section-content pt-2">
                <p>投稿件数は {{ $postCount }}</p>
                <p>下書きの投稿件数は {{ $draftCount }}</p>
                <a class="font-medium text-blue-600 hover:underline"
                href="{{ route('admin.posts.index')}}">投稿一覧ページへ</a>
            </div>
        </section>
        <section class="bg-white p-5 rounded">
            <h2 class="section-title text-xl font-semibold">カテゴリー一覧
            </h2>
            <div class="section-content pt-2">
                <p>カテゴリー数は{{ $categoryCount }}</p>
                <a class="font-medium text-blue-600 hover:underline"
                href="{{ route('admin.categories.index')}}">カテゴリー一覧ページへ</a>
            </div>
        </section>
        <section class="bg-white p-5 rounded">
            <h2 class="section-title text-xl font-semibold">ユーザー一覧</h2>
            <div class="section-content pt-2">
                <p>ユーザーの数は{{ $userCount }}</p>
                <a class="font-medium text-blue-600 hover:underline"
                href="{{ route('admin.users.index')}}">ユーザー一覧ページへ</a>
            </div>
        </section>
        <section class="bg-white p-5 rounded">
            <h2 class="section-title text-xl font-semibold">メディア一覧</h2>
            <div class="section-content pt-2">
                <a class="font-medium text-blue-600 hover:underline"
                href="{{ route('admin.media.index')}}">メディア一覧ページへ</a>
            </div>
        </section>
    </div>
@endsection
