@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('../../css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Dashboard')

@section('content')
    <div class="blog-header">
        <h2>Dashboard</h2>
    </div>

    <div class="dashboard-container">
        <div class="dashboard-left">
            <div class="dashboard-widget">
                <h3>Total Posts</h3>
                 <p>TotalPosts</p>
            </div>

            <div class="dashboard-widget">
                <h3>Completed Posts</h3>
                <p>completedPostsCount</p>
            </div>

            <div class="dashboard-widget">
                <h3>Pending Posts</h3>
                <p>pendingPostsCount</p>
            </div>

            <div class="dashboard-widget">
                <h3>Total Categories</h3>
                <p>totalCategories</p>
            </div>
        </div>

        <div class="dashboard-right">
            <div class="dashboard-widget">
                <h3>Recent Activity</h3>

            </div>
        </div>
    </div>
@endsection

