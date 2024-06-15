<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile; // Assurez-vous d'importer le modèle de profil
use App\Models\User; // Assurez-vous d'importer le modèle d'utilisateur

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Store the user's profile information.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation des données (vous pouvez utiliser $request->validate() pour la validation)

        // Création d'un nouveau profil avec les données soumises
        $profile = new Profile();
        $profile->full_name = $request->input('full_name');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        // Enregistrement du profil dans la base de données
        $profile->save();

        // Redirection vers une page de confirmation ou toute autre action
        return redirect()->back()->with('success', 'Profile created successfully!');
    }

    /**
     * Display the dashboard.
     */
    public function index(): View
    {
        $totalUsers = User::count();
        // Autres logiques pour obtenir les données nécessaires

        return view('dashboard', [
            'totalUsers' => $totalUsers,
            // Autres variables nécessaires pour votre vue
        ]);
    }
}
