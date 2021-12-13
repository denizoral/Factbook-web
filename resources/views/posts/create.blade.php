@extends('layouts.master')
@section('title Create a new post')

@section('content')

<form action="{{ url('addpost') }}" method="POST">
    @csrf
    <div class="form-group">
        <link href="/css/newpost.css" rel="stylesheet">
        {{-- <label for="posArea">Enter your post below</label> --}}
        <h3 class="display-4 text-center">New post</h3>
        <textarea class="form-control" id="postArea" name="body" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Send post</button>
</form>

@endsection