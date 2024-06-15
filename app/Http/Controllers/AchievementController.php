<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Auth::user()->achievements;
        return view('user.achievements', compact('achievements'));
    }

    public function create()
    {
        return view('user.create-achievements');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);
         
        $achievement = new Achievement();
        $achievement->title = $request->input('title');
        $achievement->description = $request->input('description');
        $achievement->user_id = Auth::id();
        $achievement->save();

        return redirect()->route('user.achievements')->with('success', 'Achievement created successfully.');
    }

    public function edit(Achievement $achievement)
    {
        return view('user.edit-achievements', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
        ]);

        $achievement->title = $request->input('title');
        $achievement->description = $request->input('description');
        $achievement->save();

        return redirect()->route('user.achievements')->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('user.achievements')->with('success', 'Achievement deleted successfully.');
    }
};
