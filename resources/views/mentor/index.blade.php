@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Our Mentors</h2>

    @if($mentors->count() > 0)
        <div class="row">
            @foreach($mentors as $mentor)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            {{-- Placeholder profile photo --}}
                            <div class="text-center mb-3">
                                <img src="https://via.placeholder.com/100" class="rounded-circle" alt="Profile Photo">
                            </div>

                            <h5 class="card-title text-center">{{ $mentor->name }}</h5>
                            <p class="text-muted text-center">{{ $mentor->email }}</p>

                            <p><strong>Affiliation:</strong> {{ $mentor->institution ?? 'N/A' }}</p>
                            <p><strong>Bio:</strong> {{ $mentor->bio ?? 'No bio available' }}</p>
                            <p><strong>Experience:</strong> {{ $mentor->experience_years ? $mentor->experience_years.' years' : 'N/A' }}</p>

                            @if($mentor->google_scholar)
                                <p><a href="{{ $mentor->google_scholar }}" target="_blank">Google Scholar</a></p>
                            @endif

                            <p><strong>Available for Collaboration:</strong> 
                                @if($mentor->available_for_collab)
                                    ✅ Yes
                                @else
                                    ❌ No
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No mentors available yet.</p>
    @endif
</div>
@endsection
