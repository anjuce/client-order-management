@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Client List</h1>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Orders</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->orders->count() }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
