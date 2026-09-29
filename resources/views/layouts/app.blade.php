<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite('resources/js/app.js')
</head>

<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('articles.index') }}">
                Blog
            </a>

            <div class="d-flex gap-2">
                <a class="btn btn-outline-light" href="{{ route('articles.index') }}">
                    Articoli
                </a>

                <a class="btn btn-outline-light" href="{{ route('articles.create') }}">
                    Nuovo articolo
                </a>

                <a class="btn btn-outline-light" href="{{ route('tags.index') }}">
                    Tag
                </a>

                <a class="btn btn-outline-light" href="{{ route('tags.create') }}">
                    Nuovo tag
                </a>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>

</html>