<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Users Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4>Users Directory</h4>
            </div>
            <div class="card-body">
                <!-- Search & Filter Form -->
                <form method="GET" action="{{ route('users.index') }}" class="mb-4 row g-2 align-items-center">
                    <div class="col-md-6">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Search by research interest..." 
                            value="{{ old('search', $search ?? '') }}"
                        />
                    </div>
                    <div class="col-md-4">
                        <select name="category" class="form-select">
                            <option value="">Filter by Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ (isset($category) && $category == $cat->id) ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">Search</button>
                    </div>
                </form>

                @if($users->count() > 0)
                    <div class="list-group">
                        @foreach($users as $user)
                            <div class="list-group-item">
                                <h5>{{ $user->name }}</h5>
                                <p class="mb-1"><strong>Institution:</strong> {{ $user->institution }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>

                                @if($user->researchInterests->count() > 0)
                                    <p><strong>Research Interests:</strong></p>
                                    <ul>
                                        @foreach($user->researchInterests as $interest)
                                            <li>{{ $interest->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-muted">No interests selected.</p>
                                @endif

                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info mt-2">View Profile</a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">
                        No users found matching your search.
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
