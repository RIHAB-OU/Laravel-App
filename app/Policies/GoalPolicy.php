<?php

namespace App\Policies;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GoalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Goal $goal)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    use HandlesAuthorization;

    /**
     * Determine whether the user can update the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Goal  $goal
     * @return mixed
     */
    public function update(User $user, Goal $goal)
    {
        // Allow update if the authenticated user is the owner of the goal
        return $user->id === $goal->user_id;
    }

    /**
     * Determine whether the user can delete the goal.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Goal  $goal
     * @return mixed
     */
    public function delete(User $user, Goal $goal)
    {
        // Allow delete if the authenticated user is the owner of the goal
        return $user->id === $goal->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Goal $goal)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Goal  $goal
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Goal $goal)
    {
        //
    }
}
