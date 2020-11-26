<?php

namespace UNK\Praesidium\Traits;

use Illuminate\Support\Facades\Auth;

trait PraesidiumTrait 
{
    public function roles()
    {
        return $this->belongsToMany('UNK\Praesidium\Models\Role')->withTimestamps();
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

    public function haveRole($role)
    {
        if (Auth::guard()->check())
        {
            foreach($this->roles as $UserRole)
            {
                if($UserRole['full-access'] == "yes")
                {
                    return true;
                }
                
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
