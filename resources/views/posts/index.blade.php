@extends('layouts.master')
@section('title homepage')

@section('content')

    <link href="/css/styles.css" rel="stylesheet">
    @if (Auth::check())
    <div class="addPost">
        <h5>Send a post down below</h5>
        <input class="form-control" type="text" placeholder="Default input">
        <input type="button" id="sendBtn" placeholder="Add Post">
    </div>
    @else
    <div class="addPost">
        <h5>Log in or register to be able to send posts</h5>
    </div>
    @endif


    @foreach ($posts as $post)
        
        <div class="postContent">
            <div>
                <img class="postLogoPic" src="/img/apple.png">
            </div>
            <div class="postUsername">{{ App\Models\User::find($post->post_author)->name }} </div>
            <div class="postDate">{{ $post->created_at }}</div>
            <h3 style="clear: left; margin-left: 5px;">{{ App\Models\User::find($post->post_content) }}</h3>

    
            <p style="margin-left: 5px;">{{ $post->post_content }}</p>
    

        </div>
    @endforeach
@endsection