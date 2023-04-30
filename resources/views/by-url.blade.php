<x-layout>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">URL</th>
                <th scope="col">Number of requests</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($urls as $url)
                <tr>
                    <th scope="row">{{ $url->url }}</th>
                    <td>{{ $url->num_requests }}</td>
                </tr>
            @endforeach
    </table>
    {{ $urls->links() }}
</x-layout>
