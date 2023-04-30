<x-layout>
    <body class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <h1>429 | Too many requests</h1>
        <p class="text-secondary text-center">
            Woah! Slow down there buddy, you're going too fast.<br>
            You're allowed {{ config('app.web_max_requests_per_minute') }} requests per minute.<br>
            Try again in a little bit.
        </p>
    </body>
</x-layout>
