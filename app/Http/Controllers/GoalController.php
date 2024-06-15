<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Goal;




class GoalController extends Controller
{
    /**
     * Display the user's goals.
     *
     * @return View
     */
    public function index(): View
    {
        $goals = Auth::user()->goals;
        return view('user.goals', compact('goals'));
    }

    /**
     * Show the form for creating a new goal.
     *
     * @return View
     */
    public function create(): View
    {
        return view('user.create');
    }

    /**
     * Store a newly created goal in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Auth::user()->goals()->create($request->all());

        return redirect()->route('user.goals')->with('success', 'Goal created successfully.');
    }
    

     /**
     * Show the form for editing the specified goal.
     *
     * @param Goal $goal
     * @return View
     */
    public function edit(Goal $goal): View
    {
        // Authorize that the user can update the goal
        $this->authorize('update', $goal);

        return view('user.edit-goal', compact('goal'));
    }

    /**
     * Update the specified goal in storage.
     *
     * @param Request $request
     * @param Goal $goal
     * @return RedirectResponse
     */
    public function update(Request $request, Goal $goal): RedirectResponse
    {
        // Authorize the user to update the goal
        $this->authorize('update', $goal);

        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Update the goal with the validated data
        $goal->update($request->all());

        // Redirect back with a success message
        return redirect()->route('user.goals')->with('success', 'Goal updated successfully.');
    }

     /**
     * Remove the specified goal from storage.
     *
     * @param Goal $goal
     * @return RedirectResponse
     */
    public function delete(Goal $goal): RedirectResponse
    {
        // Authorize the user to delete the goal
        $this->authorize('delete', $goal);

        // Delete the goal
        $goal->delete();

        // Redirect back with a success message
        return redirect()->route('user.goals')->with('success', 'Goal deleted successfully.');
    }

    
}
