<?php 

namespace UNK\Praesidium;

use UNK\Praesidium\Models\Role;
use UNK\Praesidium\Models\Permission;

class Praesidium
{
    public function getAllRoles()
    {
        return Role::all();
    }

    public function getAllPermissions()
    {
        return Permission::all();
    }
}
