<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Templates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">ResearchBuddy</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-body text-center">
                <h2 class="mb-4">Downloadable Templates</h2>

                <div class="d-flex flex-column gap-3 align-items-center">
                    <a href="https://www.overleaf.com/latex/templates/acm-conference-proceedings-primary-article-template/wbvnghjbzwpc" 
                       target="_blank" 
                       class="btn btn-primary btn-lg w-50">
                        ACM Templates
                    </a>

                    <a href="https://www.overleaf.com/latex/templates/ieee-conference-template/grfzhhncsfqn" 
                       target="_blank" 
                       class="btn btn-success btn-lg w-50">
                        IEEE Templates
                    </a>

                    <a href="https://www.overleaf.com/latex/templates/tagged/cv" 
                       target="_blank" 
                       class="btn btn-info btn-lg w-50">
                        CV Templates
                    </a>
                </div>

                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅ Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
