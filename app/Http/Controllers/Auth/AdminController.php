<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Subscription;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function create(): View
    {
        return view('admin.auth.register');
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
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif'], // Adjust validation rules as needed
        ]);

        $imageName = null;
        if ($request->hasFile('profile_image')) {
            $imageName = time() . '.' . $request->profile_image->extension();
            $request->profile_image->storeAs('public/profiles', $imageName);
        }

        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'profile_image' => $imageName,
        ]);

        event(new Registered($admin));

        Auth::login($admin);

        return redirect(RouteServiceProvider::DASHBOARD_ADMIN);
    }

    public function dashboard(Request $request): View
    {
        $userCount = User::where('role', 'user')->count();
        $adminCount = User::where('role', 'admin')->count();
        $coachCount = User::where('role', 'coach')->count();

        $user = Auth::user();

        return view('admin.dashboard', compact('userCount', 'adminCount', 'coachCount', 'user'));
    }

    public function users_list(): View
    {
        $users = User::where('role', 'user')->get();
        return view('admin.users-list', compact('users'));
    }

    public function coachs_list(): View
    {
        $coachs = User::where('role', 'coach')->get();
        return view('admin.coachs-list', compact('coachs'));
    }

    public function adminProfile(): View
    {
        return view('admin.profile');
    }

    public function editProfile(): View
    {
        $admin = Auth::user();
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request): RedirectResponse
    {
        $admin = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'nullable|string|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->back()->with('success', 'Your details updated successfully!');
    }

    public function edit(User $user): View
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->back()->with('success', 'User profile updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function subscriptions_list(): View
    {
        $subscriptions = Subscription::all();
        return view('admin.list-subscriptions', compact('subscriptions'));
    }

    public function subscriptions_add(): View
    {
        return view('admin.subscriptions-add');
    }

    public function subscriptions_store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        Subscription::create($request->all());

        return redirect()->back()->with('success', 'Subscription plan created successfully!');
    }

    public function subscriptions_edit(Subscription $subscription): View
    {
        return view('admin.edit-subscriptions', compact('subscription'));
    }

    public function subscriptions_update(Request $request, Subscription $subscription): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $subscription->update($request->all());

        return redirect()->route('subscriptions.list')->with('success', 'Subscription plan updated successfully!');
    }

    public function subscriptions_destroy(Subscription $subscription): RedirectResponse
    {
        $subscription->delete();
        return redirect()->route('subscriptions.list')->with('success', 'Subscription plan deleted successfully!');
    }
}