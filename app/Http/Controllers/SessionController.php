<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    // Affiche la liste de toutes les sessions
    public function index()
    {
        $sessions = Session::with(['user', 'coach'])->get();
        return view('admin.list-sessions', compact('sessions'));
    }

    // Affiche le formulaire pour ajouter une nouvelle session
    public function create()
    {
        $coaches = User::where('role', 'coach')->get();
        $users = User::where('role', 'user')->get();
        return view('admin.add-sessions', compact('coaches', 'users'));
    }

    // Enregistre une nouvelle session// app/Http/Controllers/SessionController.php
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'coach_id' => 'required|exists:coaches,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $session = new Session();
        $session->name = $request->name;
        $session->coach_id = $request->coach_id;
        $session->user_id = $request->user_id;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->save();

        return redirect()->route('sessions.list')->with('success', 'Session added successfully');
    }

    // Supprime une session
 
    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
    
        return redirect()->route('sessions.list')->with('success', 'Session deleted successfully');
    }   // Affiche les sessions à venir pour l'utilisateur connecté
    public function upcomingSessions()
    {
        $user = Auth::user();
        $sessions = Session::where('user_id', $user->id)
                            ->where('start_date', '>=', now())
                            ->get();
        return view('user.upcoming-sessions', compact('sessions'));
    }

    // Affiche les sessions passées pour l'utilisateur connecté
    public function pastSessions()
    {
        $user = Auth::user();
        $sessions = Session::where('user_id', $user->id)
                            ->where('start_date', '<=', now())
                            ->get();
        return view('user.past-sessions', compact('sessions'));
    }

 

    // Afficher les sessions à venir pour les coachs
    public function upcoming()
    {
        $sessions = Session::where('date', '>', now())->get();
        return view('coach.sessions-upcoming', compact('sessions'));
    }


}
