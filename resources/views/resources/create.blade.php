@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 720px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-3">Add a Resource</h3>

            <form action="{{ route('resources.store') }}" method="POST">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title <span class="text-danger">*</span></label>
                    <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="e.g., Great tutorial on X"
                        required
                    >
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea
                        name="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Briefly describe the resource and why it's useful"
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Link --}}
                <div class="mb-3">
                    <label class="form-label">Link (URL) <span class="text-danger">*</span></label>
                    <input
                        type="url"
                        name="link"
                        class="form-control @error('link') is-invalid @enderror"
                        value="{{ old('link') }}"
                        placeholder="https://example.com/article"
                        required
                    >
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tags --}}
                <div class="mb-3">
                    <label class="form-label">Tags (comma-separated)</label>
                    <input
                        type="text"
                        name="tags"
                        class="form-control @error('tags') is-invalid @enderror"
                        value="{{ old('tags') }}"
                        placeholder="ai, nlp, dataset"
                    >
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Save Resource</button>
                    <a href="{{ route('resources.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>

        </div>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅ Back to Home</a>
    </div>
</div>
@endsection
