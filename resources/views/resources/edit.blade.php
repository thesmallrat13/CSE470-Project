@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Resource</h2>

    <form action="{{ route('resources.update', $resource->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $resource->title) }}" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $resource->description) }}</textarea>
        </div>

        <!-- Link -->
        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" id="link" class="form-control"
                   value="{{ old('link', $resource->link) }}" required>
        </div>

        <!-- Tags -->
        <div class="form-group">
            <label for="tags">Tags (comma separated)</label>
            <input type="text" name="tags" id="tags" class="form-control"
                   value="{{ old('tags', $resource->tags) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Resource</button>
    </form>
</div>
@endsection
