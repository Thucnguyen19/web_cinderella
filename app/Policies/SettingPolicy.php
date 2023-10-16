<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SettingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.list-setting'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.add-setting'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.edit-setting'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.delete-setting'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user)
    {
        //
    }
}
