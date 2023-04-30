<x-layout>
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
                    <th scope="col">URL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <th scope="row">{{ $request->id }}</th>
                        <td>{{ $request->created_at }}</td>
                        <td>{{ $request->ip_address }}</td>
                        <td>{{ $request->userAgent->user_agent }}</td>
                        <td>{{ $request->url }}</td>
                    </tr>
                @endforeach
        </table>
        {{ $requests->links() }}
    </body>
</x-layout>
