@extends('layouts.base')

@section('content')
<div class="container">
    <h1>Create a New Team</h1>
    <form action="{{ route('teams.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="team-name">Team Name</label>
            <input type="text" class="form-control" id="team-name" name="name" placeholder="Enter team name" required>
        </div>
        <!-- Add other input fields for team properties here if needed -->
        <button type="submit" class="btn btn-primary">Create Team</button>
    </form>
</div>
@endsection