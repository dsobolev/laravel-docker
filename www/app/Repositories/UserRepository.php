<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Role;

class UserRepository
{    
    /**
     * Returns users w/Administrators role
     * @return Illuminate\Database\Eloquent\Collection List of users
     */
    public function getAdminUsers()
    {
        return Role::where('name', 'admin')->first()->users;
    }
}