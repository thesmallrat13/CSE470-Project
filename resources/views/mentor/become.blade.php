@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Left side profile photo placeholder -->
        <div class="col-md-3 text-center">
            <img src="https://via.placeholder.com/150" class="img-fluid rounded-circle" alt="Profile Photo">
        </div>

        <!-- Right side mentor form -->
        <div class="col-md-9">
            <h2>Become a Mentor</h2>
            <p class="text-muted">Fill in your details to be listed as a mentor. Other users will be able to see your profile.</p>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('mentor.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea id="bio" name="bio" class="form-control" rows="3" required>{{ old('bio') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="experience_years" class="form-label">Research Experience (Years)</label>
                    <input type="number" id="experience_years" name="experience_years" class="form-control" value="{{ old('experience_years') }}" required>
                </div>

                <div class="mb-3">
                    <label for="google_scholar" class="form-label">Google Scholar Profile</label>
                    <input type="url" id="google_scholar" name="google_scholar" class="form-control" value="{{ old('google_scholar') }}" placeholder="https://scholar.google.com/...">
                </div>

                <div class="mb-3">
                    <label for="publications" class="form-label">Publications</label>
                    <textarea id="publications" name="publications" class="form-control" rows="3">{{ old('publications') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="available_for_collab" class="form-label">Available for Collaboration?</label>
                    <select id="available_for_collab" name="available_for_collab" class="form-select" required>
                        <option value="1" {{ old('available_for_collab') == "1" ? "selected" : "" }}>Yes</option>
                        <option value="0" {{ old('available_for_collab') == "0" ? "selected" : "" }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save and Become a Mentor</button>
            </form>
        </div>
    </div>
</div>
@endsection
