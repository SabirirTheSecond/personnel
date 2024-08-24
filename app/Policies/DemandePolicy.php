<?php

namespace App\Policies;

use App\Models\Demande;
use App\Models\User;

class DemandePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user,  $id){
        return $user->role==='admin';
    }

    public function view(User $user, Demande $demande){

        return true;
    }
}
