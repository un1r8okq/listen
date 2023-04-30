<x-layout>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">IP address</th>
                <th scope="col">Number of requests</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ips as $ip)
                <tr>
                    <th scope="row">{{ $ip->ip_address }}</th>
                    <td>{{ $ip->num_requests }}</td>
                </tr>
            @endforeach
    </table>
    {{ $ips->links() }}
</x-layout>
