@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Research Interests</h3>
    <form action="{{ route('research.update') }}" method="POST">
        @csrf

        @foreach($categories as $category)
            <div class="mb-3">
                <h5>{{ $category->name }}</h5>

                @if($category->children->count() > 0)
                    <ul>
                        @foreach($category->children as $child)
                            <li>
                                <input type="checkbox" 
                                       name="interests[]" 
                                       value="{{ $child->id }}" 
                                       {{ in_array($child->id, $userInterests) ? 'checked' : '' }}>
                                {{ $child->name }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No subcategories available.</p>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save Interests</button>
    </form>
</div>
@endsection
