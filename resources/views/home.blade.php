<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if (session('user.isAdmin'))
                        <div class="alert alert-info" role="alert">
                            {{ __('You are an admin!') }}
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            {{ __('You are a regular user!') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
