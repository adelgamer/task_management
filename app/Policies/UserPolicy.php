<?php

namespace App\Policies;

use App\Models\GroupHasRight;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Getting the user group id
        $group_id = Session::get("user")->getGroup->id;
        // Getting the group rights with id 6 and checking if it's true or false
        $right = GroupHasRight::where(["right_id" => 6, "group_id" => $group_id])->first()->has;
        return $right;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return true;
    }
}
