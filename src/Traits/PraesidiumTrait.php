<?php

namespace UNK\Praesidium\Traits;

use Illuminate\Support\Facades\Auth;

trait PraesidiumTrait 
{
    public function roles()
    {
        return $this->belongsToMany('App\Permissions\Models\Role')->withTimestamps();
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

            return false;
        }
        else
        {
            return false;
        }
    }
}