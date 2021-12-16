@extends('layouts.master')
@section('title Create a new post')

@section('content')

<form action="{{ url('addpost') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
          Sending a post
        </div>
        <div class="card-body">
          <h5 class="card-title"></h5>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="body" class="form-control" id="content" rows="3"></textarea>
                <button style="margin-top: 10px" type="submit" class="btn btn-success">Send post</button>
              </div>
          </form>
        </div>
      </div>
</form>

@endsection