@extends('layouts.app')

@section('content')
    <h1>Orders for Client</h1>

    <form method="GET" action="{{ route('clients.orders.index', ['client' => $clientId]) }}">
        <label for="status">Filter by status:</label>
        <select name="status" id="status">
            <option value="">All</option>
            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        <button type="submit">Filter</button>
    </form>

    <table>
        <thead>
        <tr>
            <th>Order ID</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Due Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->description }}</td>
                <td>{{ $order->amount }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->due_date }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No orders found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
