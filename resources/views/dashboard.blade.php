@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Welcome block -->
    <div class="card mb-4 p-4">
        <h3>Welcome to the biggest research collab community!</h3>
        <p>Find help, mentorship, and build a community of harmony.</p>

        <div class="row mt-3">
            <!-- Profile image -->
            <div class="col-md-3 d-flex justify-content-center align-items-start">
                <div class="border rounded-circle bg-secondary" style="width: 150px; height: 150px;"></div>
            </div>

            <!-- Profile info -->
            <div class="col-md-9 position-relative">
                <a href="{{ route('profile.edit') }}" 
                   class="btn btn-light position-absolute" 
                   style="top:0; right:0;">✏️</a>

                <h4>{{ Auth::user()->name }}</h4>
                <p>Institution: {{ Auth::user()->institution ?? 'Not set' }}</p>
                <p>Email: {{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>

    <!-- Research Interests block -->
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <h4>Your Research Interests</h4>
            <a href="{{ route('research.edit') }}" class="btn btn-primary btn-sm">Edit Research Interests</a>
        </div>

        @if(Auth::user()->researchInterests && Auth::user()->researchInterests->count() > 0)
            <ul class="list-group mt-3">
                @foreach(Auth::user()->researchInterests as $interest)
                    <li class="list-group-item">{{ $interest->name }}</li>
                @endforeach
            </ul>
        @else
            <p class="mt-3 text-muted">No research interests added yet.</p>
        @endif
    </div>
</div>
@endsection
