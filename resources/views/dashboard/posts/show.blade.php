@extends('layout')

@section('additional-css')
<style>
.blog-img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 4px;
}

.blog-fake-img {
    width: 100%;
    height: 500px;
    background-color: #aaa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 4px;
}
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            @if($post->banner)
                <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="blog-img">
            @else
                <div class="blog-fake-img">No Image</div>
            @endif

            <div class="p-8">
                <div class="mb-6 flex justify-between items-start">
                    <h1 class="text-4xl font-bold text-gray-900">{{ $post->title }}</h1>
                    @auth
                        <div class="flex space-x-4">
                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                                <i class="fa fa-edit mr-2"></i> Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    <i class="fa fa-trash mr-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>

                <div class="flex items-center text-sm text-gray-600 mb-8">
                    @if($post->category)
                        <span class="mr-4">
                            <i class="fa fa-folder-open mr-2"></i>
                            {{ $post->category }}
                        </span>
                    @endif
                    <span class="mr-4">
                        <i class="fa fa-calendar mr-2"></i>
                        {{ $post->date instanceof \Carbon\Carbon ? $post->date->format('M d, Y') : $post->date }}
                    </span>
                    <span>
                        <i class="fa fa-user mr-2"></i>
                        {{ $post->user ? $post->user->username : 'Deleted User' }}
                    </span>
                </div>

                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($post->content)) !!}
                </div>

                <div class="mt-8 pt-8 border-t border-gray-200">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center text-blue-500 hover:text-blue-600 transition">
                        <i class="fa fa-arrow-left mr-2"></i>
                        Back to Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 