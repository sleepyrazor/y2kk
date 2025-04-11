@extends('layouts.app')
@php
    use App\Http\Controllers\PostController;
@endphp
@section('content')
    <div class="container">
        <h1 class="my-4">Posts sobre {{ $category }}</h1>
        <div class="mt-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        </div>
        @if($posts->isEmpty())
            <div class="alert alert-warning mt-4" role="alert">
                No posts available.
            </div>
        @else
            <div id="post-rows" class="mt-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr id="post-{{ $post->id }}">
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->content }}</td>
                                    <td>{{ (new PostController)->get_post_username($post->id) }}</td>
                                    <td>{{ $post->created_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
