@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Client</h1>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Add Client</button>
        </form>
    </div>
@endsection
