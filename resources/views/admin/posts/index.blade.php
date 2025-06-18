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
                    <th scope="col" class="px-6 py-3">
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
                        {{ $post->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <?php
                            if ($post->status == 'draft') {
                                print ('下書き');
                            }else{
                                print ('公開中');
                            }
                        ?>
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->created_at }}
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST"
                            action="{{ route('admin.posts.destroy', $post->id) }}"
                            onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                {{-- 削除 --}}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
