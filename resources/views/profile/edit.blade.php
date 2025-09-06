@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-start" style="min-height: 80vh; margin-top: 50px;">
    <div class="card w-50 shadow-sm p-4">
        <h3 class="mb-4 text-center">Edit Profile</h3>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
            </div>

            <!-- Institution -->
            <div class="mb-3">
                <label for="institution" class="form-label">Institution</label>
                <input type="text" name="institution" id="institution" class="form-control" value="{{ old('institution', Auth::user()->institution) }}">
            </div>

            <!-- Bio -->
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <textarea name="bio" id="bio" class="form-control" rows="3">{{ old('bio', Auth::user()->bio) }}</textarea>
            </div>

            <!-- Experience Years -->
            <div class="mb-3">
                <label for="experience_years" class="form-label">Years of Experience</label>
                <input type="number" name="experience_years" id="experience_years" class="form-control" value="{{ old('experience_years', Auth::user()->experience_years) }}">
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary w-50">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
