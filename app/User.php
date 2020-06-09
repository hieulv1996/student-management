<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'userId', 'email', 'phoneNumber', 'fullName', 'dob', 'gender',
        'permanentAddress', 'temporaryAddress', 'identityCard', 'active',
        'createdBy', 'updatedBy', 'roleId', 'classCode', 'password', 'majorId', 'departmentId'
    ];
}
