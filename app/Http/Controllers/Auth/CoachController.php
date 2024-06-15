<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resource;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;

class CoachController extends Controller
{
    public function create(): View
    {
        return view('coach.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Adjust validation rules as needed
        ]);
        
        $imageName = null;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->storeAs('public/profiles', $imageName);
        }

        $coach = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "coach",
            'profile_image' => $imageName,
        ]);

        event(new Registered($coach));

        Auth::login($coach);

        return redirect(RouteServiceProvider::DASHBOARD_COACH);
    }
    
    public function dashboard(Request $request): View
    {
        $userCount = User::where('role', 'user')->count();
        $adminCount = User::where('role', 'admin')->count();
        $coachCount = User::where('role', 'coach')->count();

        // Get the currently authenticated user
        $user = Auth::user();

        return view('coach.dashboard', compact('userCount', 'adminCount', 'coachCount', 'user'));
    }

    public function users_list(): View
    {
        $users = User::where('role', 'user')->get();
        return view('coach.users-list', compact('users'));
    }

    public function coachProfile(): View
    {
        return view('coach.profile');
    }

    public function editProfile(): View
    {
        $coach = Auth::user();
        return view('coach.edit', compact('coach'));
    }

    public function update(Request $request): RedirectResponse
    {
        $coach = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $coach->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|min:8',
        ]);

        $coach->name = $request->name;
        $coach->email = $request->email;
        $coach->phone = $request->phone;

        if ($request->filled('password')) {
            $coach->password = Hash::make($request->password);
        }

        $coach->save();

        return redirect()->back()->with('success', 'Your details updated successfully!');
    }
    public function resources_list()
    {
        // Récupérer les ressources associées à l'utilisateur connecté
        $resources = Auth::user()->resources;
        return view('coach.list-resources', compact('resources'));
    }
}

