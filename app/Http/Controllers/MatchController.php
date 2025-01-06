<?php
// app/Http/Controllers/MatchController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class MatchController extends Controller
{
    public function index()
    {
        // Fetch data from the C# API with disabled SSL verification
        $liveMatchesResponse = Http::withOptions(['verify' => false])->get('https://localhost:7270/api/Match');

        $matches = $liveMatchesResponse->json();

        $ongoingMatches = [];
        $upcomingMatches = [];
        $finishedMatches = [];

        foreach ($matches as $match) {
            $startTime = Carbon::parse($match['startTime']);
            $endTime = $startTime->copy()->addMinutes(90);

            if ($endTime->isPast()) {
                $finishedMatches[] = $match;
            } elseif ($startTime->isPast()) {
                $ongoingMatches[] = $match;
            } else {
                $upcomingMatches[] = $match;
            }
        }

        // Pass data to the Blade template
        return view('homepage', [
            'ongoingMatches' => $ongoingMatches,
            'upcomingMatches' => $upcomingMatches,
            'finishedMatches' => $finishedMatches,
        ]);
    }
}
