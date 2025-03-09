@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
            <div class="space-x-4 space-x-reverse">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        @if($post->banner)
        <div class="mb-6">
            <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg">
        </div>
        @endif

        <div class="mb-4 text-sm text-gray-600">
            <span>Category: {{ $post->category }}</span>
            <span class="mx-2">|</span>
            <span>Date: {{ $post->date }}</span>
            <span class="mx-2">|</span>
            <span>Author: {{ $post->user ? $post->user->username : 'Deleted User' }}</span>
        </div>

        <div class="prose prose-lg max-w-none">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="mt-8">
            <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-600">
                ← Back to Posts List
            </a>
        </div>
    </div>
</div>
@endsection 