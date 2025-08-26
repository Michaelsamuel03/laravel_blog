

@extends('layouts.app')

@section('content')
<h2>Create Post</h2>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
    </div>
    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
    </div>
    <button class="btn btn-success">Create</button>
</form>
@endsection
