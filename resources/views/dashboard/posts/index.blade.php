@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('../../css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Posts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
            Create New Post
        </a>
    </div>

    @if($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if($post->banner)
                        <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                    
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ Str::limit($post->content, 100) }}
                        </p>
                        
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span>{{ $post->category }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $post->date }}</span>
                            <span class="mx-2">•</span>
                            <span>Author: {{ $post->user ? $post->user->username : 'Deleted User' }}</span>
                        </div>

                        <div class="flex justify-end space-x-2 space-x-reverse">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-600">
                                View
                            </a>
                            <span class="text-gray-300">|</span>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-green-500 hover:text-green-600">
                                Edit
                            </a>
                            <span class="text-gray-300">|</span>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500">No posts found.</p>
        </div>
    @endif
</div>
@endsection

