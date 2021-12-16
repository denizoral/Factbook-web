<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        // $commentCount = Comment::whereNotNull('post_id')->count();
        return view('posts.index', ['posts' => $posts]);
    }

    public function addPost(Request $req) {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'body' => 'required|max:255',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        if ($request->image == null) {
            $post = new Post;
            $post->author=Auth::id();
            $post->content=$request['body'];
            $post->save();
            return redirect('dashboard')->with(['message' => 'Your post has been submitted.', 'alert' => 'alert-success']);
        }

        $newImageName = time() . '-' . $request->image->extension();


        $request->image->move(public_path('images'), $newImageName);

        $post = new Post;
        $post->author=Auth::id();
        $post->content=$request['body'];
        $post->image_path=$newImageName;
        $post->save();
        return redirect('dashboard')->with(['message' => 'Your post has been submitted', 'alert' => 'alert-success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', '=', $post->id)->latest()->paginate(5);
        return view('posts.post', ['post' => $post], ['comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->id == $post->author || auth()->user()->is_admin) {
            return view('editpost', ['post' => $post]);
        }
        return redirect()->to('post/'.$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'body' => 'required|max:255'
        ]);

        $post = Post::find($id);
        //$post->author=Auth::id();
        $post->content=$request['body'];
        $post->edited=true;
        $post->update();
        return redirect()->to('post/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $result=$post->delete();
        return redirect('dashboard');
    }
}
