@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Client</h1>
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $client->name }}" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $client->email }}" required>

            <button type="submit">Update Client</button>
        </form>
    </div>
@endsection
