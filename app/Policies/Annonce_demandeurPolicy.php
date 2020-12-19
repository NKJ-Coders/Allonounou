<?php

namespace App\Policies;

use App\User;
use App\Annonce_demandeur;
use Illuminate\Auth\Access\HandlesAuthorization;

class Annonce_demandeurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any annonce_demandeurs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the annonce_demandeur.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce_demandeur  $annonceDemandeur
     * @return mixed
     */
    public function view(User $user, Annonce_demandeur $annonceDemandeur)
    {
        //
    }

    /**
     * Determine whether the user can create annonce_demandeurs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the annonce_demandeur.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce_demandeur  $annonceDemandeur
     * @return mixed
     */
    public function update(User $user, Annonce_demandeur $annonceDemandeur)
    {
        //
    }

    /**
     * Determine whether the user can delete the annonce_demandeur.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce_demandeur  $annonceDemandeur
     * @return mixed
     */
    public function delete(User $user, Annonce_demandeur $annonceDemandeur)
    {
        //
    }

    /**
     * Determine whether the user can restore the annonce_demandeur.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce_demandeur  $annonceDemandeur
     * @return mixed
     */
    public function restore(User $user, Annonce_demandeur $annonceDemandeur)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the annonce_demandeur.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce_demandeur  $annonceDemandeur
     * @return mixed
     */
    public function forceDelete(User $user, Annonce_demandeur $annonceDemandeur)
    {
        //
    }

    public function liker(User $user)
    {
        return in_array($user->type, ['recruteur']);
    }

    public function signaler(User $user)
    {
        return in_array($user->type, ['recruteur']);
    }

    public function addList(User $user)
    {
        return in_array($user->type, ['recruteur']);
    }
}
