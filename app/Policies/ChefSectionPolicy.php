<?php

namespace App\Policies;

use App\Models\ChefSection;
use App\Models\User;

class ChefSectionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //

    }

    public function delete(User $user,  ChefSection $chef){
        return $user->role === 'admin';

    }
    
}

