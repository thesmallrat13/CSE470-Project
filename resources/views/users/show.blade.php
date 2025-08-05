<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}'s Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4>{{ $user->name }}'s Profile</h4>
        </div>
        <div class="card-body">
            <p><strong>Institution:</strong> {{ $user->institution }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <h5 class="mt-4">Research Interests:</h5>
            @if($user->researchInterests->count() > 0)
                <ul>
                    @foreach($user->researchInterests as $interest)
                        <li>{{ $interest->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No interests selected.</p>
            @endif

            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to Directory</a>
        </div>
    </div>
</div>
</body>
</html>
