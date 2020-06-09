<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'id', 'majorCode', 'majorName', 'majorTimeTraining', 'majorCostPerCredit', 'departmentId', 'active'
    ];
}
