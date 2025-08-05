<!DOCTYPE html>
<html>
<head>
    <title>Edit Research Interests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4>Select Your Research Interests</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('research.update') }}">
                @csrf
                @foreach($categories as $category)
                    <div class="mb-3">
                        <h5>{{ $category->name }}</h5>
                        @foreach($category->children as $child)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                    name="interests[]" value="{{ $child->id }}" 
                                    {{ in_array($child->id, $selected) ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $child->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                @endforeach
                <button type="submit" class="btn btn-primary w-100">Save Interests</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
