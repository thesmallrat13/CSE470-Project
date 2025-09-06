@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Mentors</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($mentors as $mentor)
            <div class="col-md-4 mb-3">
                <div class="card p-3">
                    <h5>{{ $mentor->name }}</h5>
                    <p>{{ $mentor->bio }}</p>
                    <p>Experience: {{ $mentor->experience_years }} years</p>

                    <!-- Direct Get Mentorship button -->
                    <a href="{{ route('mentorship.get', $mentor->id) }}" class="btn btn-success btn-sm">
                        Get Mentorship
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
