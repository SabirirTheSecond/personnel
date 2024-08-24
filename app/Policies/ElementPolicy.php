<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Element;

class ElementPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function delete(User $user,  Element $element){
        return $user->role === 'admin';

    }
}
