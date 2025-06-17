@extends('admin.layouts.app')

@section('title','ユーザー編集')
@section('content')
    <div>
        <h1>ユーザー編集</h1>
    </div>

    <div class="flex">
        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="w-1/2">
            @csrf
            @method('PUT')
            <div class="form-control my-4">
                <label for="name" class="label">
                    <span class="label-text">名前:</span>
                </label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="input input-bordered w-full border @error('name') border-red-500 @else border-gray-300 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">メールアドレス:</span>
                </label>
                <input type="text" name="email" value="{{ old('email', $user->email) }}"
                    class="input input-bordered w-full border @error('email') border-red-500 @else border-gray-300 @enderror">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </form>
    </div>
@endsection
