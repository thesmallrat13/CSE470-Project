@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 bg-light">
        <div class="card-body">
            <h3 class="mb-4">{{ $user->name }}</h3>

            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Institution:</strong> {{ $user->institution ?? 'Not set' }}</p>
            <p><strong>Mentorship Status:</strong> {{ $user->is_mentor ? 'Yes' : 'No' }}</p>

            <div class="text-center mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">⬅ Back to All Users</a>
            </div>
        </div>
    </div>
</div>
@endsection
