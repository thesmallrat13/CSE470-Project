@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 800px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-3">{{ $resource->title }}</h3>

            <p class="text-muted">{{ $resource->description }}</p>

            @if($resource->tags)
                <div class="mb-3">
                    @foreach(explode(',', $resource->tags) as $tag)
                        <span class="badge bg-secondary">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            @endif

            <a href="{{ $resource->link }}" target="_blank" class="btn btn-outline-primary">
                Open Link
            </a>
        </div>
        <div class="card-footer small text-muted">
            Added {{ $resource->created_at->toDayDateTimeString() }}
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('resources.index') }}" class="btn btn-secondary">⬅ Back to Resources</a>
    </div>
</div>
@endsection
