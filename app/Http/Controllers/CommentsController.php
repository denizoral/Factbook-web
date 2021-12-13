<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentsController extends Controller
{
    public function store(Post $post, Request $req) {
        $comment = new Comment;

        $comment->post_id = $post->id;
        $comment->author = Auth::id();
        $comment->comment = $req['body'];
        $comment->save();

        return back();
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return back();
    }
}
