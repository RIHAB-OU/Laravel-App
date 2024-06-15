<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Controller
{
    /**
     * Display the registration form.
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        return view('user.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        $imageName = null;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->storeAs('public/profiles', $imageName);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "user",
            'profile_image' => $imageName,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD_USER);
    }

    /**
     * Display the user's dashboard.
     *
     * @return View
     */
    public function dashboard(): View
    {
        // Get the logged-in user's ID
        $userId = Auth::id();

        // Check if the user has a subscription
        $hasSubscription = Subscription::where('user_id', $userId)->exists();
        // Get the user's interests
        $user = Auth::user();
        $hasInterests = !empty($user->interests);

        // Pass the results to the view
        return view('user.dashboard', compact('hasSubscription', 'hasInterests', 'user'));
    }

    /**
     * Display the user's profile.
     *
     * @return View
     */
    public function profile(): View
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the user's profile.
     *
     * @return View
     */
    public function editProfile(): View
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Your details updated successfully!');
    }

    /**
     * Show the form for editing a specific user.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('user.edit-user', compact('user'));
    }

    /**
     * Update a specific user's profile.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }


    public function achievements()
    {
        $user = auth()->user(); // Ou tout autre moyen de récupérer l'utilisateur
        $achievements = $user->achievements;

        return view('user.achievements', compact('achievements'));

    }
    public function createAchievements()
    {
        return view('user.create-achievements');
    }

    public function subscriptionsList()
    {
        //$subscriptions = Subscription::all();
        //$user = Auth::user();

        $subscriptions = Subscription::where('status', 'active')

            ->get();

        return view('user.subscriptions', compact('subscriptions'));
    }


    public function subs(Request $request, Subscription $subscription): RedirectResponse
    {
        $user = Auth::user();



        $request->validate([

            'subscription_id' => 'required|integer|exists:subscriptions,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Your details updated successfully!');
    }

    public function subscribe(Subscription $subscription)
    {
        $user = auth()->user();

        // Update user's subscription
        $user->subscription_id = $subscription->id;

        $user->save();

        // Save user with error handling
        if (!$user->save()) {
            return back()->withErrors(['subscription' => 'Subscription assignment failed!']);
        }

        $message = 'Subscription successful!';

        // Redirect with success message (uncomment if desired)
        return redirect()->back()->with('message', $message);

        // Alternatively, just return the success message for API usage
        // return $message;
    }


    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

}
