@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Create a New Tournament</h1>
    <form action="{{ route('tournaments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tourney-name">Tournament Name</label>
            <input type="text" class="form-control" id="tourney-name" name="name" placeholder="Enter tournament name" required>
        </div>
        <!-- Add other input fields for tournament properties here if needed -->
        <button type="submit" class="btn btn-primary">Create Tournament</button>
    </form>
</div>
@endsection