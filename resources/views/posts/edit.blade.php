@extends('layouts.app')

@section('content')
<h2>Edit Post</h2>
<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}">
    </div>
    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
    </div>
    <button class="btn btn-warning">Update</button>
</form>
@endsection
