<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeamsController extends Controller
{
    public function create(Request $request)
    {
        $teamData = [
            'name' => $request->input('name'),
            // Add other team properties here if needed
        ];

        $response = Http::withOptions(['verify' => false])->post('https://localhost:7270/api/Teams', $teamData);

        if ($response->successful()) {
            return redirect()->route('homepage')->with('success', 'Team created successfully!');
        } else {
            return redirect()->route('homepage')->with('error', 'Failed to create team.');
        }
    }

    public function showCreateForm()
    {
        return view('teams.create');
    }
}