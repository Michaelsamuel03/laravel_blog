@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p><small>By {{ $post->user->name }} | {{ $post->created_at->toDayDateTimeString() }}</small></p>
    </div>
</div>
@endsection
