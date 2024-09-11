<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Month</th>
            <th>Total Booking</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['vehicle_per_month'] as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['month'] }}</td>
                <td>{{ $item['total'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>