@extends('layouts.master')
@section('title homepage')

@section('content')

    <div>
        @if (auth()->check() && auth()->user()->is_admin == 1)
            <h5 style="text-align: center">You are logged in as an admin</h5>
            <h5 style="text-align: center">You can edit and delete any post.</h5>
        @endif
        @if (Auth::check())
        <form action="{{ url('addpost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="addPost">
                @if(session()->has('message'))
                    <div class="alert {{session('alert') ?? 'alert-info'}}">
                        {{ session('message') }}
                    </div>
                @endif
                <h5>Send a post down below</h5>
                <textarea class="form-control" name="body" rows="3" autofocus required></textarea>
                Your image: <input type="file" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="image">
                <hr>
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
                    <img class="postLogoPic" src="{{ App\Models\User::find($post->author)->profile_picture }}">
                </div>
                <div class="postUsername">Posted by <b>{{ App\Models\User::find($post->author)->name }}</b></div>
                <time class="postDate" datetime="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</time>
                <h3 style="clear: left; margin-left: 5px;">{{ App\Models\User::find($post->content) }}</h3>

        
                <p class="content">{{ $post->content }}</p>
                @if ($post->image_path == !null)
                <img class="postPic" src="/images/{{ $post->image_path }}">
                @endif
                <div class="postMisc">
                    <a href="#"><button style="margin-bottom: 10px;" class="btn btn-block btn-primary"><i class="fa fa-thumbs-up">Like</i> </button></a>
                    <a href="#"><button style="margin-bottom: 10px;" class="btn btn-block btn-primary"><i class="fa fa-thumbs-down">Dislike</i> </button></a>
                    @if ($post->comments->count() <= 0)
                    <a href="/post/{{ $post->id }}"><button style="margin-bottom: 10px;" class="btn btn-block btn-primary">View comments</button></a>
                    @else
                    <a href="/post/{{ $post->id }}"><button style="margin-bottom: 10px;" class="btn btn-block btn-primary">View {{ $post->comments->count() }} comments</button></a>
                    @endif
                    @if ($post->author == Auth::id() || (auth()->check() && auth()->user()->is_admin == 1))
                    <button style="margin-bottom: 10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownbtn" data-bs-toggle="dropdown" aria-expanded="false">
                    Options
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownbtn">
                        <li><a onclick="event.preventDefault(); document.getElementById('edit-post').submit();" class="dropdown-item" href="">Edit post</a></li>
                        <li><a onclick="event.preventDefault(); document.getElementById('delete-post').submit();" class="dropdown-item" href="">Delete post</a></li>
                    </ul>
                    <form id="delete-post" action="/post/delete/{{ $post->id }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    <form id="edit-post" action="/editpost/{{ $post->id }}" method="GET" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endif
                </div>
            </div>
            
        @endforeach
        <div class="paginator">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
