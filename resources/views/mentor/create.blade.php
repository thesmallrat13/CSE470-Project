@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Become a Mentor</h2>
    <form action="{{ route('mentor.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Bio</label>
            <textarea name="bio" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Years of Research Experience</label>
            <input type="number" name="experience_years" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Google Scholar Profile</label>
            <input type="url" name="google_scholar" class="form-control">
        </div>
        <div class="mb-3">
            <label>Publications</label>
            <textarea name="publications" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Available for Collaboration?</label>
            <select name="available" class="form-control" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
