@extends('layouts.base')

@section('content')

<div class="container py-5">

    <!-- Aankomende Wedstrijden Sectie -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Aankomende Wedstrijden</h5>
                    <p class="card-text">Hieronder vind je de wedstrijden die binnenkort plaatsvinden:</p>
                    <div class="match-list">
                        <!-- Wedstrijd item -->
                        <div class="match-item d-flex justify-content-between align-items-center py-3">
                            <div class="team-info">
                                <span class="team-name">Team A</span> vs <span class="team-name">Team B</span>
                            </div>
                            <div class="score">
                                <span class="score-value">-</span>
                            </div>
                            <div class="status">
                                <p><strong>Status:</strong> Aankomend</p>
                            </div>
                            <div class="edit-button">
                                <a href="#" class="btn btn-warning">Bewerken</a>
                            </div>
                        </div>
                        <!-- Herhaal bovenstaande voor meer aankomende wedstrijden -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bezig Met Wedstrijden Sectie -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Bezig Met Wedstrijden</h5>
                    <p class="card-text">De volgende wedstrijden zijn momenteel aan de gang:</p>
                    <div class="match-list">
                        <!-- Wedstrijd item -->
                        <div class="match-item d-flex justify-content-between align-items-center py-3">
                            <div class="team-info">
                                <span class="team-name">Team E</span> vs <span class="team-name">Team F</span>
                            </div>
                            <div class="score">
                                <span class="score-value">1 - 0</span>
                            </div>
                            <div class="status">
                                <p><strong>Status:</strong> Bezig</p>
                            </div>
                            <div class="edit-button">
                                <a href="#" class="btn btn-warning">Bewerken</a>
                            </div>
                        </div>
                        <!-- Herhaal bovenstaande voor meer bezig met wedstrijden -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Afgelopen Wedstrijden Sectie -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Afgelopen Wedstrijden</h5>
                    <p class="card-text">Hieronder vind je de wedstrijden die afgelopen zijn:</p>
                    <div class="match-list">
                        <!-- Wedstrijd item -->
                        <div class="match-item d-flex justify-content-between align-items-center py-3">
                            <div class="team-info">
                                <span class="team-name">Team G</span> vs <span class="team-name">Team H</span>
                            </div>
                            <div class="score">
                                <span class="score-value">2 - 1</span>
                            </div>
                            <div class="status">
                                <p><strong>Status:</strong> Afgelopen</p>
                            </div>
                            <div class="edit-button">
                                <a href="#" class="btn btn-warning">Bewerken</a>
                            </div>
                        </div>
                        <!-- Herhaal bovenstaande voor meer afgelopen wedstrijden -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
