<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Notifications\PostNotification;
use Illuminate\Notifications\Notification;

class CommentsController extends Controller
{
    public function store($id, Request $request) {

        $request->validate([
            'body' => 'required|max:255'
        ]);

       
        
        $post = Post::find($id);
        $comment = new Comment;

        $comment->post_id = $post->id;
        $comment->author = Auth::id();
        $comment->comment = $request['body'];
        $comment->save();

        $commentAuthor = User::find($comment->author);
        $postAuthor = User::find($post->author);

        $message = [
            'title' => 'You received a comment on your post from ' . $commentAuthor->name,
            'content' => 'click here to check it',
            'url' => url('/post/'.$post->id)
        ];

        //prevent getting notifications if you comment on your own post.
        if (!($commentAuthor->id == $postAuthor->id)){
            $postAuthor->notify(new PostNotification($message));
        }

        return back();
    }

    public function destroy($comment) {
        $comment = Comment::find($comment);
        if (auth()->user()->id == $comment->author || auth()->user()->is_admin) {
            $comment->delete();
            return back();
        }
        return redirect()->to('dashboard')->with(['message' => 'You can not delete that comment', 'alert' => 'alert-danger']);
    }

    public function edit($id)
    {
       $comment = Comment::findOrFail($id);
       if (auth()->user()->id == $comment->author || auth()->user()->is_admin){  
            return view('comments.edit', ['comment' => $comment]);
        } else {
            return redirect()->to('dashboard')->with(['message' => 'You can not edit that comment', 'alert' => 'alert-danger']);
        }
        
    }

    public function update(Request $request, $id) {

        $request->validate([
            'body' => 'required|max:255'
        ]);

        $comment = Comment::find($id);
        $comment->comment = $request['body'];
        $comment->update();
        return redirect()->to('post/'.$comment->post_id);
    }

}
