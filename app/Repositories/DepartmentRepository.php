<?php


namespace App\Repositories;


use App\Departments;

class DepartmentRepository extends Repository
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Departments::class;
    }

    public function getActiveDepartment() {
        return Departments::where([
            ['active','=', true],
        ])->get();
    }
}
