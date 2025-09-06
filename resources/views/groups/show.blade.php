@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>{{ $group->name }}</h3>
                @if(!$group->users->contains(auth()->id()))
                    <form action="{{ route('groups.join', $group->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Join Group</button>
                    </form>
                @endif
            </div>
            <p class="text-muted">{{ $group->description }}</p>
        </div>
    </div>

    <!-- Tabs for Group Content -->
    <ul class="nav nav-tabs mt-4" id="groupTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="members-tab" data-toggle="tab" href="#members" role="tab">Members</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="resources-tab" data-toggle="tab" href="#resources" role="tab">Resources</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="progress-tab" data-toggle="tab" href="#progress" role="tab">Goals / Progress</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab">Notes</a>
        </li>
    </ul>

    <div class="tab-content mt-3" id="groupTabContent">
        <!-- Members -->
        <div class="tab-pane fade show active" id="members" role="tabpanel">
            <ul class="list-group">
                @foreach($group->users as $user)
                    <li class="list-group-item">👤 {{ $user->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Resources -->
        <div class="tab-pane fade" id="resources" role="tabpanel">
            <h5>Add Resource</h5>
            <form action="{{ route('groups.resources.store', $group->id) }}" method="POST" class="mb-3">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Short title" required>
                </div>
                <div class="form-group">
                    <input type="url" name="link" class="form-control" placeholder="Resource link" required>
                </div>
                <button type="submit" class="btn btn-success">Add Resource</button>
            </form>

            <ul class="list-group mt-3">
                @forelse($group->resources as $resource)
                    <li class="list-group-item">
                        📂 <a href="{{ $resource->link }}" target="_blank">{{ $resource->title }}</a> 
                        <span class="text-muted">by {{ $resource->user->name }}</span>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No resources added yet.</li>
                @endforelse
            </ul>
        </div>

        <!-- Progress -->
        <div class="tab-pane fade" id="progress" role="tabpanel">
            <h5>Add Goal / Event</h5>
            <form action="{{ route('groups.progress.store', $group->id) }}" method="POST" class="mb-3">
                @csrf
                <div class="form-group">
                    <input type="text" name="stage" class="form-control" placeholder="Goal / Event" required>
                </div>
                <button type="submit" class="btn btn-success">Add Goal</button>
            </form>

            <ul class="list-group mt-3">
                @forelse($group->progress as $p)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $p->stage }}
                        <form action="{{ route('groups.progress.toggle', [$group->id, $p->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $p->completed ? 'btn-success' : 'btn-outline-secondary' }}">
                                {{ $p->completed ? '✅ Done' : '⏳ Mark Complete' }}
                            </button>
                        </form>
                    </li>
                @empty
                    <li class="list-group-item text-muted">No goals yet.</li>
                @endforelse
            </ul>
        </div>

        <!-- Notes -->
        <div class="tab-pane fade" id="notes" role="tabpanel">
            <h5>Post a Note</h5>
            <form action="{{ route('groups.notes.store', $group->id) }}" method="POST" class="mb-3">
                @csrf
                <div class="form-group">
                    <textarea name="content" class="form-control" placeholder="Write a message..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>

            <ul class="list-group mt-3">
                @forelse($group->notes as $note)
                    <li class="list-group-item">
                        📝 <strong>{{ $note->user->name }}:</strong> {{ $note->content }}
                    </li>
                @empty
                    <li class="list-group-item text-muted">No notes shared yet.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
