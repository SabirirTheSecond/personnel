<?php

namespace App\Policies;

use App\Models\Billet;
use App\Models\User;

class BilletPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Billet $billet){

        return $user->role == 'admin';
    }
    public function delete(User $user, Billet $billet){

        return $user->role == 'admin';
    }
}
