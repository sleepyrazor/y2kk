@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p><strong>Category:</strong> {{ $post->category }}</p>
        <p><strong>Content:</strong></p>
        <p>{{ $post->content }}</p>
        <p><strong>Created By:</strong> {{ $post->user_id }}</p>
        <div class="comment-section">
            <h1>Comments</h1>
            <form action="{{ route('comments.store', ['id' => $post->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    <label for="content">Add a Comment:</label>
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @if ($comments->isEmpty())
                <p>No comments yet.</p>
            @else
                @foreach ($comments as $comment)
                    <div class="comment">
                        <p><strong>{{ $comment->user->name }}:</strong></p>
                        <p>{{ $comment->content }}</p>
                        <p><small>Posted on {{ $comment->created_at }}</small></p>
                        @if (Auth::user()->id == $comment->user_id)

                            <form action="{{ route('comments.delete', ['comment' => $comment]) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif

                    </div>
                @endforeach
            @endif
        </div>

        <a href="{{ route('posts.index_series') }}" class="btn btn-secondary">Back to Posts</a>
    </div>

@endsection