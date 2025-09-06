@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Browse Research Topics</h3>
    <p class="text-muted">View all research categories and subcategories.</p>

    @if($categories->count() > 0)
        <div class="accordion mt-3" id="categoriesAccordion">
            @foreach($categories as $category)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $category->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}" aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $category->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $category->id }}" data-bs-parent="#categoriesAccordion">
                        <div class="accordion-body">
                            @if($category->children->count() > 0)
                                <ul class="list-group">
                                    @foreach($category->children as $sub)
                                        <li class="list-group-item">{{ $sub->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">No subcategories available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-muted">No research topics available.</p>
    @endif
</div>
@endsection
