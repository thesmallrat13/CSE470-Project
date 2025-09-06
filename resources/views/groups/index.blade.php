@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">All Study Groups</h2>
    
    <div class="row">
        @forelse($groups as $group)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $group->name }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($group->description, 80, '...') }}
                        </p>
                        <p class="small mb-2">👥 Members: {{ $group->users->count() }}</p>
                        <a href="{{ route('groups.show', $group->id) }}" class="btn btn-primary mt-auto">View Group</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No groups available yet.</p>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('groups.create') }}" class="btn btn-success">+ Create New Group</a>
    </div>
</div>
@endsection
