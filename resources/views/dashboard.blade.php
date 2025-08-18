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

            <!-- Dropdown Menu -->
            <div class="dropdown ms-3">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="featuresDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Features
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="featuresDropdown">
                    <li><a class="dropdown-item" href="{{ route('research.topics') }}">Browse & Bookmark Topics</a></li>
                    <li><a class="dropdown-item" href="{{ route('research.roadmap') }}">Research Roadmap</a></li>
                    <li><a class="dropdown-item" href="{{ route('research.timeline') }}">Timeline & Milestones</a></li>
                    <li><a class="dropdown-item" href="{{ route('forum.index') }}">Forum Discussions</a></li>
                    <li><a class="dropdown-item" href="{{ route('resources.index') }}">Share Resources</a></li>
                    <li><a class="dropdown-item" href="{{ route('mentors.index') }}">Mentors</a></li>
                    <li><a class="dropdown-item" href="{{ route('ethics.checklist') }}">Research Ethics Checklist</a></li>
                    <li><a class="dropdown-item" href="{{ route('templates.index') }}">Templates</a></li>
                    <li><a class="dropdown-item" href="{{ route('conferences.index') }}">Conference Announcements</a></li>
                </ul>
            </div>

            <div class="d-flex ms-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-lg border-0 p-4">
            <div class="row">
                <!-- Left side: Profile picture -->
                <div class="col-md-3 d-flex justify-content-center align-items-start">
                    <div class="border rounded-circle bg-secondary" style="width: 150px; height: 150px;"></div>
                </div>

                <!-- Right side: Info -->
                <div class="col-md-9">
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

                    <div class="mt-4 d-flex flex-wrap gap-3">
                        <a href="{{ route('profile.edit') }}" class="btn btn-info">Edit Profile</a>
                        <a href="{{ route('research.edit') }}" class="btn btn-primary">Edit Research Interests</a>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">View All Users</a>
                        <a href="{{ route('mentor.create') }}" class="btn btn-success">Become a Mentor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
