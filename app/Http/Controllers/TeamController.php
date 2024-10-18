<?php

namespace App\Http\Controllers; 
use App\Models\User;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team()
    {
        $team = User::get();
        // dd($team);
        return view('team.index', ['team' => $team]);
    }
}
