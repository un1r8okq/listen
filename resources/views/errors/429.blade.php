<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }} | Too many requests</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        >
    </head>
    <body class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <h1>429 | Too many requests</h1>
        <p class="text-secondary text-center">
            Woah! Slow down there buddy, you're going too fast.<br>
            You're allowed {{ config('app.web_max_requests_per_minute') }} requests per minute.<br>
            Try again in a little bit.
        </p>
    </body>
</html>
