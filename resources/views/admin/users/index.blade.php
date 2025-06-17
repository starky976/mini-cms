@extends('admin.layouts.app')

@section('title','ユーザー一覧')
@section('content')
    <div class="flex ">
        <h1 class="flex-1 block text-2xl font-semibold">ユーザー一覧</h1>
        <a class="flex-0 text-white bg-blue-700 hover:bg-blue-800  focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        href="{{route('admin.users.create')}}">ユーザー追加</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-10">
        @if (isset($users))
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        名前
                    </th>
                    <th scope="col" class="px-6 py-3">
                        メールアドレス
                    </th>
                    <th scope="col" class="px-6 py-3">
                        役割
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{route('admin.users.edit', $user->id ) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            {{ $user->name}}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->role}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection
