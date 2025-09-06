@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Forum</h2>

    <form method="GET" action="{{ route('forum.index') }}" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search..." value="{{ request('search') }}">
        <select name="sort" class="form-select me-2">
            <option value="recent" {{ $sort == 'recent' ? 'selected' : '' }}>Most Recent</option>
            <option value="votes" {{ $sort == 'votes' ? 'selected' : '' }}>Most Voted</option>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <form method="POST" action="{{ route('forum.store') }}" class="mb-4">
        @csrf
        <input type="text" name="title" class="form-control mb-2" placeholder="Post title" required>
        <textarea name="content" class="form-control mb-2" placeholder="Post content" required></textarea>
        <button type="submit" class="btn btn-success">Post</button>
    </form>

    <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><a href="{{ route('forum.show', $post->id) }}">{{ $post->title }}</a></h5>
                        <small>By <a href="{{ url('/user/'.$post->user->id) }}">{{ $post->user->name }}</a></small>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                    </div>
                    <div class="text-center">
                        <form method="POST" action="{{ route('forum.vote', [$post->id, 'up']) }}">@csrf <button>⬆️</button></form>
                        <div>{{ $post->score() }}</div>
                        <form method="POST" action="{{ route('forum.vote', [$post->id, 'down']) }}">@csrf <button>⬇️</button></form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
