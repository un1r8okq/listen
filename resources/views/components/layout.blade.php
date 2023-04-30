<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap CSS used for collapsible nav on mobile -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        >
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Listen</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a
                                @class([
                                    'nav-link',
                                    'active' => Request::path() == 'all',
                                ])
                                {{!! Request::path() == 'all' && 'aria-current="page"' }}
                                href="/all"
                            >
                                All requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                @class([
                                    'nav-link',
                                    'active' => Request::path() == 'by-ip',
                                ])
                                {{!! Request::path() == 'by-ip' && 'aria-current="page"' }}
                                href="/by-ip"
                            >
                                Requests by IP
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                @class([
                                    'nav-link',
                                    'active' => Request::path() == 'by-url',
                                ])
                                {{!! Request::path() == 'by-url' && 'aria-current="page"' }}
                                href="/by-url"
                            >
                                Requests by URL
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            {{ $slot }}
        </div>
        <!-- Bootstrap JS used for collapsible nav on mobile -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
