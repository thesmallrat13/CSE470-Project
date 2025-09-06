@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Research Timeline</h2>

    <form method="POST" action="{{ route('research.timeline.store') }}">
        @csrf
        <div class="mb-3">
            <input type="text" name="stage" class="form-control" placeholder="Enter research stage..." required>
        </div>
        <button type="submit" class="btn btn-primary">Add Stage</button>
    </form>

    <h4 class="mt-4">Your Progress: {{ $percentage }}%</h4>
    <div class="progress mb-3">
        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;">
            {{ $percentage }}%
        </div>
    </div>

    <ul class="list-group">
        @foreach($progress as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <form method="POST" action="{{ route('research.timeline.toggle', $task->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-sm {{ $task->completed ? 'btn-success' : 'btn-secondary' }}">
                        {{ $task->completed ? '✓' : '○' }}
                    </button>
                </form>
                <span class="{{ $task->completed ? 'text-decoration-line-through' : '' }}">
                    {{ $task->stage }}
                </span>
            </li>
        @endforeach
    </ul>
</div>
@endsection
