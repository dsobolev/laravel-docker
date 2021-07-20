<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{    
    /**
     * Returns list of associative arrays in the form of:
     *     [
     *         [ 'label' => role_label, 'value' => role_name ],
     *         ...
     *     ]
     *
     * @return array
     */
    public function getRolesForHTMLSelect()
    {
        $values = Role::all()->map(function($item){
            return [ 'label' => $item->label, 'value' => $item->name ];
        });

        return $values->prepend([
                'label' => '',
                'value' => null
            ])->all();
    }

    public function getRoleByName(string $roleName)
    {
        return Role::where('name', $roleName)->first();
    }
}