<?php

namespace UNK\Praesidium\Traits;

use UNK\Praesidium\Models\Role;
use Illuminate\Support\Facades\Auth;
use UNK\Praesidium\Models\Permission;

trait PraesidiumTrait 
{
    public function roles()
    {
        $userRoleTableNameConfig = config('praesidium.tables.role_user');
        return $this->belongsToMany(Role::class, $userRoleTableNameConfig)->withTimestamps();
    }

    public function permissions()
    {
        $userPermissionsTableNameConfig = config('praesidium.tables.permission_user');
        return $this->belongsToMany(Permission::class, $userPermissionsTableNameConfig)->withTimestamps();
    }
    
    function havePermission($permission)
    {
        if (Auth::guard()->check())
        {
            foreach ($this->roles as $role) {
                if($role['full-access'] == "yes")
                {
                    return true;
                }

                foreach ($role->permissions as $perm) {
                    if($perm->slug == $permission)
                    {
                        return  true;
                    }
                }
            }

            foreach ($this->permissions as $perm) {
                if($perm->slug == $permission)
                {
                    return  true;
                }
            }

            return false;
        }
        else
        {
            return false;
        }
    }

    public function haveRole($role)
    {
        if (Auth::guard()->check())
        {
            foreach($this->roles as $UserRole)
            {    
                if ($UserRole->slug == $role)
                {
                    return true;
                }
            }   
            
            return false;
        }

        return false;
    }
}
