<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ResearchBuddy</a>
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body text-center">
                <h2>Welcome, {{ Auth::user()->name }} 👋</h2>
                <p class="mt-3">Institution: {{ Auth::user()->institution }}</p>
                <p>Email: {{ Auth::user()->email }}</p>

                <hr>

                <h4>Your Research Interests:</h4>
                @if(Auth::user()->researchInterests->count() > 0)
                    <ul class="list-group mt-3">
                        @foreach(Auth::user()->researchInterests as $interest)
                            <li class="list-group-item">{{ $interest->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mt-3">You haven't added any research interests yet.</p>
                @endif

                <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="{{ route('research.edit') }}" class="btn btn-primary">Edit Research Interests</a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">View All Users</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
