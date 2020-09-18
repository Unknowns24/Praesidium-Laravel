<?php

namespace UNK\Praesidium\Models;

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
        $UserModelLocation = config('praesidium.location.Models.user');

        return $this->belongsToMany("$UserModelLocation")->withTimestamps();
    }

    public function permissions() : BelongsToMany 
    {
        return $this->belongsToMany('UNK\Praesidium\Models\Permission')->withTimestamps();
    }
}
