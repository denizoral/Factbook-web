@extends('layouts.master')
@section('title posts')

@section('content')
    
    <div class="postBox">
        <div>
            <img class="postLogoPic" src="{{ App\Models\User::find($post->author)->profile_picture }}">
        </div>
        <div class="postUsername">Posted by <b>{{ App\Models\User::find($post->author)->name }}</b></div>
        <time class="postDate" datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time>
        <p class="content" style="margin-left: 5px;">{{ $post->content }}</p>
        @if ($post->image_path == !null)
                <img class="postPic" src="/images/{{ $post->image_path }}">
        @endif
        @if ($post->author == Auth::id() || Auth::user()->is_admin)
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Options
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a onclick="event.preventDefault(); document.getElementById('edit-post').submit();" class="dropdown-item" href="">Edit post</a></li>
                <li><a onclick="event.preventDefault(); document.getElementById('delete-post').submit();" class="dropdown-item" href="">Delete post</a></li>
                </ul>
            </div>
            <form id="delete-post" action="/post/delete/{{ $post->id }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form id="edit-post" action="/editpost/{{ $post->id }}" method="GET" style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
    
    @if (Auth::check())
    <div class="sendComment">
        <form action="/post/{{ $post->id }}/comments" method="POST">
            @csrf
            <label for="body">Enter your comment</label>
            <textarea class="form-control" name="body" rows="3" required></textarea>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send comment</button>
        </form>
    </div>
    @else
        <div class="addPost">
            <h5>Please log in or register to comment.</h5>
        </div>
    @endif
    <h5 style="text-align: center">Comments</h5>
    @foreach ($comments as $comment) 
        <div class="commentBox">
            <div>
                <img class="postLogoPic" src="{{App\Models\User::find($comment->author)->profile_picture}}">
            </div>
                <div class="commentUsername">Comment by <b>{{ App\Models\User::find($comment->author)->name }}</b></div>
                <time class="postDate" datetime="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</time>
                <div style="margin-left: 5px;">{{ ($comment->comment) }}</div>
                @if ($comment->author == Auth::id() || Auth::user()->is_admin)
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a onclick="event.preventDefault(); document.getElementById('edit-comment{{ $comment->id }}').submit();" class="dropdown-item" class="dropdown-item" href="#">Edit comment</a></li>
                        <li><a onclick="event.preventDefault(); document.getElementById('delete-comment{{ $comment->id }}').submit();" class="dropdown-item" href="#">Delete comment</a></li>
                        </ul>
                    </div>
                    <form id="delete-comment{{ $comment->id }}" action="/comment/delete/{{ $comment->id }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    <form id="edit-comment{{ $comment->id }}" action="/editcomment/{{ $comment->id }}" method="GET" style="display: none;">
                    </form>
                @endif
        </div>
    @endforeach
    <div class="paginator">
        {{ $comments->links() }}
    </div>
@endsection