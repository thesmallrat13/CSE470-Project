<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">ResearchBuddy</a>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Conference Announcements</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>Conference</th>
                    <th>Submission Type</th>
                    <th>Deadline</th>
                    <th>Conference Date</th>
                    <th>Website</th>
                    @if(Auth::user()->role === 'mentor')
                        <th>Edit</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($conferences as $conf)
                <tr>
                    <td>{{ $conf['name'] }}</td>
                    <td>{{ $conf['submission'] }}</td>
                    <td>{{ $conf['deadline'] }}</td>
                    <td>{{ $conf['date'] }}</td>
                    <td>
                        <a href="{{ $conf['website'] }}" target="_blank" class="btn btn-sm btn-primary">Visit</a>
                    </td>
                    @if(Auth::user()->role === 'mentor')
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅ Back to Dashboard</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
