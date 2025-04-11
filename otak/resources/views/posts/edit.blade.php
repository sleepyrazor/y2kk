@extends('layouts.app')
@php
    use App\Http\Controllers\PostController;
@endphp
@if (Auth::check() && Auth::user()->id == $post->user_id)
    @section('content')
        <div class="container">
            <h1>Edit Post</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $post->category) }}" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="user_id">Created By</label>
                    <p>{{ (new PostController)->get_post_username($post->id) }}</p>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('posts.index_series') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    @endsection

@else
    @section('content')
        <div class="container">
            <h1>Unauthorized</h1>
            <p>You are not authorized to edit this post.</p>
            <a href="{{ route('posts.index_series') }}" class="btn btn-secondary">Back to Posts</a>
        </div>
    @endsection
@endif