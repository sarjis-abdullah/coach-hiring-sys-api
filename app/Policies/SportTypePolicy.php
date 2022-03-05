<?php

namespace App\Policies;

use App\Models\SportType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SportTypePolicy
{
    use HandlesAuthorization;

    public function before(User $currentUser)
    {
        if ($currentUser->hasRole('admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param  \App\Models\SportType  $sportType
     * @return Response|bool
     */
    public function view(User $user, SportType $sportType)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return void
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param  \App\Models\SportType  $sportType
     * @return Response|bool
     */
    public function update(User $user, SportType $sportType)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  \App\Models\SportType  $sportType
     * @return Response|bool
     */
    public function delete(User $user, SportType $sportType)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param  \App\Models\SportType  $sportType
     * @return Response|bool
     */
    public function restore(User $user, SportType $sportType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param  \App\Models\SportType  $sportType
     * @return Response|bool
     */
    public function forceDelete(User $user, SportType $sportType)
    {
        //
    }
}
