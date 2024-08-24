<?php

namespace App\Policies;

use App\Models\CompteRendu;
use App\Models\User;

class CompteRenduPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user,  CompteRendu $compte){
       
        return $user->role === 'admin';

    }
}
