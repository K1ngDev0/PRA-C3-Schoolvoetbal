<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TourneyController extends Controller
{
    public function create(Request $request)
    {
        $tourneyData = [
            'name' => $request->input('name'),
        ];

        $response = Http::withOptions(['verify' => false])->post('https://localhost:7270/api/Tournaments', $tourneyData);

        if ($response->successful()) {
            return redirect()->route('homepage')->with('success', 'Tournament created successfully!');
        } else {
            return redirect()->route('homepage')->with('error', 'Failed to create tournament.');
        }
    }
}