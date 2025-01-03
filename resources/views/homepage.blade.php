@extends('layouts.base')

@section('content')
<div class="position-relative">
    <!-- Hero sectie -->
    <div class="hero">
        <!-- Hero afbeelding -->
        <img src="images/hero.png" class="img-fluid w-100" style="object-fit: cover; height: 500px;" alt="Hero image">

        <!-- Donkere overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.5);"></div>

        <!-- Hero tekst -->
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
            <h1 class="display-4">Welkom bij Wedstrijden</h1>
            <p class="lead">Bekijk live en aankomende wedstrijden hier</p>
            <a href="#matches" class="btn btn-primary">Bekijk nu</a>
        </div>
    </div>
</div>

<div class="container py-5" id="matches">
    <!-- Live wedstrijden sectie -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Wedstrijden die bezig zijn</h5>
                    <p class="card-text">Hieronder vind je de wedstrijden die momenteel bezig zijn:</p>
                    <div class="match-list">
                        <div class="match-item d-flex justify-content-between align-items-center py-3">
                            <div class="team-info">
                                <span class="team-name">Team A</span> vs <span class="team-name">Team B</span>
                            </div>
                            <div class="score">
                                <span class="score-value">9 - 0</span>
                            </div>
                            <div class="bet-button">
                                <button class="btn btn-primary">Uitbetalen</button>
                            </div>
                        </div>
                        <!-- Voeg meer wedstrijden toe hier -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- Aankomende wedstrijden sectie -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Aankomende wedstrijden</h5>
                    <p class="card-text">Hieronder vind je de wedstrijden die binnenkort plaatsvinden:</p>
                    <div class="match-list">
                        <div class="match-item d-flex justify-content-between align-items-center py-3">
                            <div class="team-info">
                                <span class="team-name">Team A</span> vs <span class="team-name">Team B</span>
                            </div>
                            <div class="score">
                                <span class="score-value">-</span>
                            </div>
                            <div class="bet-button">
                                <button class="btn btn-primary">Geld inzetten</button>
                            </div>
                        </div>
                        <!-- Voeg meer wedstrijden toe hier -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
