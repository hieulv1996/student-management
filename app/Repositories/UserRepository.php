<?php


namespace App\Repositories;


use App\User;

class UserRepository extends Repository
{
    /**
     * @inheritDoc
     */
    public function getModel () {
        return User::class;
    }

    public function getListStudentAccount() {
        return User::where([
            ['roleId','=', 'role01'],
            ['active','=', true],
        ])->get();
    }

    public function getListStudentByDepartmentCode($departmentCode) {
        return User::where([
            ['roleId','=', 'role01'],
            ['departmentId','=', $departmentCode],
        ])->get();
    }

    public function getStudentByMajorId($majorId) {
        return User::where([
            ['roleId','=', 'role01'],
            ['majorId','=', $majorId],
        ])->get();
    }
}
