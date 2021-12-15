@extends('layouts.master')
@section('title posts')

@section('content')
<div class="card">
    <div class="card-header">
      Editing your comment
    </div>
    <div class="card-body">
      <h5 class="card-title"></h5>
      <form action="/updatecomment/{{ $comment->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="body" class="form-control" id="content" rows="3">{{ $comment->comment }}</textarea>
            <button style="margin-top: 10px" type="submit" class="btn btn-success">Confirm changes</button>
          </div>
      </form>
    </div>
  </div>
@endsection