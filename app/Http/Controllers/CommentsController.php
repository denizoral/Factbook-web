<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Auth;

class CommentsController extends Controller
{
    public function store($id, Request $req) {
        $post = Post::find($id);
        $comment = new Comment;

        $comment->post_id = $post->id;
        $comment->author = Auth::id();
        $comment->comment = $req['body'];
        $comment->save();

        return back();
    }

    public function destroy($comment) {
        $comment = Comment::find($comment);
        $comment->delete();
        return back();
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('editcomment', ['comment' => $comment]);
    }

    public function update(Request $request, $id) {
        $comment = Comment::find($id);
        $comment->comment = $request['body'];
        $comment->update();
        return redirect()->to('post/'.$comment->post_id);
    }

}
