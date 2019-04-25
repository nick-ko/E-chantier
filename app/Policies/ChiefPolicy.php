<?php

namespace App\Policies;

use App\User;
use App\Chief;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChiefPolicy
{
    use HandlesAuthorization;

    public function talkTo(Chief $user, Chief $to){
        return $user->id !== $to->id;
    }

    /**
     * Determine whether the user can view the chief.
     *
     * @param  \App\User  $user
     * @param  \App\Chief  $chief
     * @return mixed
     */
    public function view(User $user, Chief $chief)
    {
        //
    }

    /**
     * Determine whether the user can create chiefs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the chief.
     *
     * @param  \App\User  $user
     * @param  \App\Chief  $chief
     * @return mixed
     */
    public function update(User $user, Chief $chief)
    {
        //
    }

    /**
     * Determine whether the user can delete the chief.
     *
     * @param  \App\User  $user
     * @param  \App\Chief  $chief
     * @return mixed
     */
    public function delete(User $user, Chief $chief)
    {
        //
    }

    /**
     * Determine whether the user can restore the chief.
     *
     * @param  \App\User  $user
     * @param  \App\Chief  $chief
     * @return mixed
     */
    public function restore(User $user, Chief $chief)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the chief.
     *
     * @param  \App\User  $user
     * @param  \App\Chief  $chief
     * @return mixed
     */
    public function forceDelete(User $user, Chief $chief)
    {
        //
    }
}
