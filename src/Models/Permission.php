<?php

namespace UNK\Praesidium\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use UNK\Praesidium\Models\Role;

class Permission extends Model
{
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('praesidium.tables.permissions'));
    }

    public function roles() : BelongsToMany
    {
        $rolePermissionsTableNameConfig = config('praesidium.tables.permission_role');
        return $this->belongsToMany(Role::class, "$rolePermissionsTableNameConfig", 'permission_id', 'role_id',)->withTimestamps(); 
    }

    public function users() : BelongsToMany
    {
        $UserModelLocation = config('praesidium.location.Models.user');
        $userPermissionTableNameConfig = config('praesidium.tables.permission_user');
        return $this->belongsToMany("$UserModelLocation", "$userPermissionTableNameConfig", 'permission_id', 'user_id')->withTimestamps(); 
    }
}   
