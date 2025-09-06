@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>
    <small>By <a href="{{ url('/user/'.$post->user->id) }}">{{ $post->user->name }}</a></small>

    <div class="d-flex align-items-center mt-2">
        <form method="POST" action="{{ route('forum.vote', [$post->id, 'up']) }}">@csrf <button>⬆️</button></form>
        <span class="mx-2">{{ $post->score() }}</span>
        <form method="POST" action="{{ route('forum.vote', [$post->id, 'down']) }}">@csrf <button>⬇️</button></form>
    </div>

    <hr>
    <h5>Comments</h5>
    <form method="POST" action="{{ route('forum.comment', $post->id) }}">
        @csrf
        <textarea name="content" class="form-control mb-2" placeholder="Write a comment..." required></textarea>
        <button type="submit" class="btn btn-primary">Comment</button>
    </form>

    <ul class="list-group mt-3">
        @foreach($post->comments as $comment)
            <li class="list-group-item">
                <b><a href="{{ url('/user/'.$comment->user->id) }}">{{ $comment->user->name }}</a></b>: 
                {{ $comment->content }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
