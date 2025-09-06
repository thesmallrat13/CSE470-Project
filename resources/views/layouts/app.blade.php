<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'ResearchBuddy') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                {{ config('app.name', 'ResearchBuddy') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- More dropdown -->
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdown">
                            <li><a class="dropdown-item" href="{{ route('users.index') }}">👥 View All Users</a></li>
                            <li><a class="dropdown-item" href="{{ route('mentors.create') }}">🌟 Become a Mentor</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('research.topics') }}">📖 Browse Research Topics</a></li>
                            <li><a class="dropdown-item" href="{{ route('research.timeline') }}">🗂 Own Research Timeline</a></li>
                            <li><a class="dropdown-item" href="{{ route('forum.index') }}">💬 Forum</a></li>
                            <li><a class="dropdown-item" href="{{ route('resources.index') }}">📚 Resources</a></li>
                            <li><a class="dropdown-item" href="{{ route('mentors.index') }}">👨‍🏫 Find Mentors</a></li>
                            <li><a class="dropdown-item" href="{{ route('templates.index') }}">📑 Templates</a></li>
                            <li><a class="dropdown-item" href="{{ route('groups.index') }}">👥 Groups</a></li>
                            <li><a class="dropdown-item" href="{{ route('conferences.index') }}">📅 View Conference Deadlines</a></li>
                            <li><a class="dropdown-item" href="{{ route('checklist.index') }}">✅ Submission Checklist</a></li>
                            <li><a class="dropdown-item" href="{{ route('announcements.index') }}">📢 Important Announcements</a></li>    
                        </ul>
                    </li>

                    <!-- Logout -->
                    @auth
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Global JS helper to send CSRF token with fetch -->
    <script>
        window.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    </script>
</body>
</html>
