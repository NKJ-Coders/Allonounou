<?php

namespace App\Policies;

use App\User;
use App\Annone_recruteur;
use Illuminate\Auth\Access\HandlesAuthorization;

class Annone_recruteurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any annone_recruteurs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the annone_recruteur.
     *
     * @param  \App\User  $user
     * @param  \App\Annone_recruteur  $annoneRecruteur
     * @return mixed
     */
    public function view(User $user, Annone_recruteur $annoneRecruteur)
    {
        //
    }

    /**
     * Determine whether the user can create annone_recruteurs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the annone_recruteur.
     *
     * @param  \App\User  $user
     * @param  \App\Annone_recruteur  $annoneRecruteur
     * @return mixed
     */
    public function update(User $user, Annone_recruteur $annoneRecruteur)
    {
        //
    }

    /**
     * Determine whether the user can delete the annone_recruteur.
     *
     * @param  \App\User  $user
     * @param  \App\Annone_recruteur  $annoneRecruteur
     * @return mixed
     */
    public function delete(User $user, Annone_recruteur $annoneRecruteur)
    {
        //
    }

    /**
     * Determine whether the user can restore the annone_recruteur.
     *
     * @param  \App\User  $user
     * @param  \App\Annone_recruteur  $annoneRecruteur
     * @return mixed
     */
    public function restore(User $user, Annone_recruteur $annoneRecruteur)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the annone_recruteur.
     *
     * @param  \App\User  $user
     * @param  \App\Annone_recruteur  $annoneRecruteur
     * @return mixed
     */
    public function forceDelete(User $user, Annone_recruteur $annoneRecruteur)
    {
        //
    }

    public function liker(User $user)
    {
        return in_array($user->type, ['demandeur']);
    }

    public function signaler(User $user)
    {
        return in_array($user->type, ['demandeur']);
    }

    public function candidater(User $user)
    {
        return in_array($user->type, ['demandeur']);
    }
}
