<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Number</th>
            <th>Name</th>
            <th>Product Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->order_id }}</td>
                <td>{{ $row->order_number }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->product_name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->phone_number }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->total_price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

