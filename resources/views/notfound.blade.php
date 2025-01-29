@extends('layout')

@section('title', 'FouX Notes | Not Found (404)')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('../css/login.css') }}">
@endsection

@section('content')
    <div class="blog-header">
        <h2>404 | Not Found</h1>
    </div>
    
    <div class="blog-container">
        <div class="blog-card">
            <div class="notfound">
                <h1>Oops! Looks like you're lost in the digital wilderness!</h1>
                <p>Don't worry, even the best explorers get lost sometimes. <a href="{{ route('home') }}">Find your way back home!</a></p>
            </div>
        </div>
    </div>
@endsection