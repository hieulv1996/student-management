<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'roleId', 'roleName', 'active', 'createdBy', 'updatedBy'
    ];
}
