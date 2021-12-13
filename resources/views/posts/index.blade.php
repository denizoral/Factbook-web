@extends('layouts.master')
@section('title homepage')

@section('content')

    @if (Auth::check())
    <form action="{{ url('addpost') }}" method="POST">
        @csrf
        <div class="addPost">
            <h5>Send a post down below</h5>
            <textarea class="form-control" name="body" rows="3" autofocus required></textarea>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send post</button>
        </div>
    </form>
    @else
    <div class="addPost">
        <h5>Log in or register to be able to send posts</h5>
    </div>
    @endif


    @foreach ($posts as $post)
        
        <div class="postContent" style="margin-top: 9px">
            <div>
                <img class="postLogoPic" src="/img/apple.png">
            </div>
            <div class="postUsername"><b>{{ App\Models\User::find($post->author)->name }}</b></div>
            <time class="postDate" datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time>
            <h3 style="clear: left; margin-left: 5px;">{{ App\Models\User::find($post->content) }}</h3>

    
            <p class="content">{{ $post->content }}</p>
            <div class="postMisc">
                <a href="#">Like</a>
                <a href="#">Dislike</a>
                <a href="/post/{{ $post->id }}">Comment</a>
            </div>
        </div>
        
    @endforeach
@endsection