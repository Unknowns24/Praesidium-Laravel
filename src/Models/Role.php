<?php

namespace UNK\Praesidium\Models;

use App\Models\User;
use UNK\Praesidium\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('praesidium.tables.roles'));
    }

    public function users() : BelongsToMany
    {
        $roleUserTableNameConfig = config('praesidium.tables.role_user');
        return $this->belongsToMany(User::class, "$roleUserTableNameConfig", 'role_id', 'user_id')->withTimestamps();
    }

    public function permissions() : BelongsToMany 
    {
        $rolePermissionTableNameConfig = config('praesidium.tables.permission_role');
        return $this->belongsToMany(Permission::class, "$rolePermissionTableNameConfig", 'role_id', 'permission_id')->withTimestamps();
    }
}
