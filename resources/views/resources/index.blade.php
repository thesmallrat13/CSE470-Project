@extends('layouts.app')

@section('content')
<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Resources</h2>
        <a href="{{ route('resources.create') }}" class="btn btn-primary">+ Add Resource</a>
    </div>

    <form class="card p-3 mb-4" method="GET" action="{{ route('resources.index') }}">
        <div class="row g-2 align-items-center">
            <div class="col-md-10">
                <input
                    type="text"
                    name="q"
                    class="form-control"
                    placeholder="Search by title, description or tags…"
                    value="{{ $q }}"
                />
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-outline-secondary">Search</button>
            </div>
        </div>
    </form>

    @if($resources->count() === 0)
        <div class="card p-4 text-center">
            <p class="mb-0 text-muted">No resources yet. Be the first to add one!</p>
        </div>
    @else
        <div class="row g-3">
            @foreach($resources as $res)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $res->title }}</h5>
                            <p class="card-text text-muted">
                                {{ \Illuminate\Support\Str::limit($res->description, 120) }}
                            </p>

                            @if($res->tags)
                                <div class="mb-3">
                                    @foreach(explode(',', $res->tags) as $tag)
                                        <span class="badge bg-secondary">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ $res->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    Open Link
                                </a>
                                <a href="{{ route('resources.show', $res) }}" class="btn btn-sm btn-outline-secondary">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">
                            Added {{ $res->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $resources->links() }}
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅ Back to Home</a>
    </div>
</div>
@endsection
