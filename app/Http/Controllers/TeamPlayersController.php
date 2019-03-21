<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamPlayersController extends Controller
{

    public function index($id)
    {
        $team = Team::with('players')->findOrFail($id);

        return $team;
    }

    public function store($id)
    {
        $team = Team::findOrFail($id);

        request()->validate([
            'first_name' => ['required', 'max:150'],
            'last_name' => ['required', 'max:150'],
        ]);
        $player = $team->players()->create(request([
            'first_name',
            'last_name'
        ]));
        return $player;
    }
}
