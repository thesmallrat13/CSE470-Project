@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Group</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('groups.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Group Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description (Optional)</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Group</button>
    </form>
</div>
@endsection
