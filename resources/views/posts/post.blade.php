@extends('layouts.master')
@section('title posts')

@section('content')
    
    <div class="postBox">
        <div>
            <img class="postLogoPic" src="/img/apple.png">
        </div>
        <div class="postUsername">{{ App\Models\User::find($post->author)->name }}</div>
        <time class="postDate" datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time>
        <p style="margin-left: 5px;">{{ $post->content }}</p>
    </div>

    <div>
        <form action="/post/{{ $post->id }}/comments" method="POST">
            @csrf
            <label for="body">Enter your comment</label>
            <textarea class="form-control" name="body" rows="3" required></textarea>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send comment</button>
        </form>
    </div>
    @foreach ($comments as $comment) 
        <div class="commentBox">
            <div>
                <img class="postLogoPic" src="/img/apple.png">
            </div>
                <div class="commentUsername">{{ App\Models\User::find($comment->author)->name }}</div>
                <div style="margin-left: 5px;">{{ ($comment->comment) }}</div>
                @if ($comment->author == Auth::id())
                    <button type="submit" class="btn btn-outline-danger">Delete comment</button>
                @endif
        </div>
    @endforeach
@endsection