<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
            text-align: left;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Orders Report</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name . ' ' . $order->user->lname }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total }} $</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
