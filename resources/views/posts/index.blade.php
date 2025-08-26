 @extends('layouts.app')

@section('content')
<h2>All Posts</h2>
@foreach($posts as $post)
    <div class="card mb-3">
        <div class="card-body">
            <h4>{{ $post->title }}</h4>
            <p>{{ Str::limit($post->content, 150) }}</p>
            <p><small>By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}</small></p>
            <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">Read More</a>

            @auth
                @if ($post->user_id === auth()->id())
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
@endforeach
@endsection
 