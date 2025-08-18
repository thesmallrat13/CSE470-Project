<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">ResearchBuddy</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                {{-- Dropdown for functions --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="functionsDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Functions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="functionsDropdown">
                        <li><a class="dropdown-item" href="{{ route('templates.index') }}">Templates</a></li>
                        <li><a class="dropdown-item" href="{{ route('conferences.index') }}">Conferences</a></li>
                        <li><a class="dropdown-item" href="{{ route('mentors.index') }}">Mentors</a></li>
                    </ul>
                </li>

                {{-- Authenticated user --}}
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
