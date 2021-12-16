@extends('layouts.master')
@section('title posts')

@section('content')

<div class="card">
    <div class="card-header">
      Editing your post
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <form action="/updatepost/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="body" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
            Your image: <input type="file" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" name="image">
            <hr>
            <button style="margin-top: 10px" type="submit" class="btn btn-success">Confirm changes</button>
          </div>
      </form>
    </div>
  </div>
@endsection