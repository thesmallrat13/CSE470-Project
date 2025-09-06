@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Browse Research Topics</h3>

    @foreach($categories as $category)
        <div class="card mb-3">
            <div class="card-header">{{ $category->name }}</div>
            <div class="card-body">
                @if($category->children->count() > 0)
                    <ul>
                        @foreach($category->children as $child)
                            <li>{{ $child->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No subcategories under this category.</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
