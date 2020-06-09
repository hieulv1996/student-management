<?php


namespace App\Repositories;


use App\Major;

class MajorRepository extends Repository
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Major::class;
    }

    public function getMajorByDepartmentId($departmentId) {
        return Major::where([
            ['departmentId','=', $departmentId],
        ])->get();
    }
}
