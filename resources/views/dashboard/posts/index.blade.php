@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('../../css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Posts')

@section('content')
    <div class="blog-header">
        <h2>Posts</h2>
    </div>
    <div class="blog-container">
        <div class="blog-right">
            <div class="clog-card">HEllo</div>
        </div>
        <div class="blog-left">
            <div class="blog-card">
                <h2>TITLE HEADING</h2>
                <h5>Title description, Dec 7, 2017</h5>
                <div class="blog-fake-img" style="height: 200px">Image</div>
                <p>Some text..</p>
            </div>
            <div class="blog-card">
                <h2>TITLE HEADING</h2>
                <h5>Title description, Sep 2, 2017</h5>
                <div class="blog-fake-img" style="height: 200px">Image</div>
                <p>Some text..</p>
            </div>
        </div>
    </div>
@endsection

