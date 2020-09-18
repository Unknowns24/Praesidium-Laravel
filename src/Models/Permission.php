<?php

namespace UNK\Praesidium\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsToMany('UNK\Praesidium\Models\Role')->withTimestamps(); 
    }
}
