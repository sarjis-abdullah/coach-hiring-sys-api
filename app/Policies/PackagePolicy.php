<?php

namespace App\Policies;

use App\Models\Package;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PackagePolicy
{
    use HandlesAuthorization;

    public function before(User $currentUser)
    {
        if ($currentUser->hasRole('coach') || $currentUser->hasRole('athlete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return void
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param  \App\Models\Package  $package
     * @return Response|bool
     */
    public function view(User $user, Package $package)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param  \App\Models\Package  $package
     * @return Response|bool
     */
    public function update(User $user, Package $package)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  \App\Models\Package  $package
     * @return Response|bool
     */
    public function delete(User $user, Package $package)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  \App\Models\Package  $package
     * @return Response|bool
     */
    public function restore(User $user, Package $package)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  \App\Models\Package  $package
     * @return Response|bool
     */
    public function forceDelete(User $user, Package $package)
    {
        //
    }
}
