<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        >
    </head>
    <body class="container pt-5">
        <h1>Listen</h1>
        <p>An app that records information about everything that visits it. Why? Idk man why do anything 🤷🏻‍♂️</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Time</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">User Agent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <th scope="row">{{ $request->id }}</th>
                        <td>{{ $request->created_at }}</td>
                        <td>{{ $request->ip_address }}</td>
                        <td>{{ $request->userAgent->user_agent }}</td>
                    </tr>
                @endforeach
        </table>
        {{ $requests->links() }}
    </body>
</html>
