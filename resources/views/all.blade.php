<x-layout>
    <div class="table-responsive">
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
    </div>
    {{ $requests->links() }}
</x-layout>
