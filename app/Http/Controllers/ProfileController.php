<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\College;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->load('socialAccounts', 'branch', 'college', 'role');
        $colleges = College::select('id', 'name')->get();
        return view('profile.index', ['profile' => $profile, 'colleges' => $colleges]);
    }

    public function update(Request $request)
    {
        $profile = Auth::user();
        $profile->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
