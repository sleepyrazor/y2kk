<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class CommentController extends Controller
{
    //
    // Display a listing of the resource.
    public function index()
    {
        $comments = Comment::with('user')->latest()->paginate(10);
        return view('comments.index', compact('comments'));
    }
    // Show the form for creating a new resource.
    public function create()
    {
        return view('comments.create');
    }
    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:255',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',

        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $request->post_id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('posts.show', ['id' => $request->post_id])->with('success', 'Comment created successfully.');
    }


    // Display the specified resource.
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }
    // Show the form for editing the specified resource.
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }
    // Update the specified resource in storage.
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }
    // Remove the specified resource from storage.
    public function destroy(Comment $comment)
    {
        $postId = $comment->post_id;
        $comment->delete();

        return redirect()->route('posts.show', ['id' => $postId])->with('success', 'Comment deleted successfully.');
    }
    // Show the form for replying to a comment.
    public function reply(Comment $comment)
    {
        return view('comments.reply', compact('comment'));
    }
    // Store a newly created reply in storage.
    public function storeReply(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $reply = new Comment();
        $reply->user_id = auth()->id();
        $reply->post_id = $comment->post_id;
        $reply->content = $request->content;
        $reply->parent_id = $comment->id; // Assuming you have a parent_id field in your comments table
        $reply->save();

        return redirect()->route('posts.show', ['post' => $comment->post_id])->with('success', 'Reply created successfully.');
    }
    // Display the specified reply. 
    public function showReply(Comment $reply)
    {
        return view('comments.show', compact('reply'));
    }
    // Show the form for editing the specified reply.
    public function editReply(Comment $reply)
    {
        return view('comments.edit', compact('reply'));
    }
    // Update the specified reply in storage.
    public function updateReply(Request $request, Comment $reply)
    {
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $reply->content = $request->content;
        $reply->save();

        return redirect()->route('posts.show', ['post' => $reply->post_id])->with('success', 'Reply updated successfully.');
    }
    // Remove the specified reply from storage.
    public function destroyReply(Comment $reply)
    {
        $reply->delete();
        return redirect()->route('posts.show', ['post' => $reply->post_id])->with('success', 'Reply deleted successfully.');
    }
}
