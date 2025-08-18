@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label>Institution</label>
            <input type="text" name="institution" class="form-control" value="{{ $user->institution }}">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
