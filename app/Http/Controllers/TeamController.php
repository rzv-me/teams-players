<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        return Team::get();
    }

    public function create()
    {
        //
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'max:150'],
        ]);
        $team = Team::create(request([
            'name'
        ]));
        return $team;
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);

        return $team;
    }

    public function edit(Team $team)
    {
        //
    }

    public function update(Request $request, Team $team)
    {
        //
    }

    public function destroy(Team $team)
    {
        //
    }
}
