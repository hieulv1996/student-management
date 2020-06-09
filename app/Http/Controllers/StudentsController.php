<?php

namespace App\Http\Controllers;

use App\Major;
use App\Repositories\MajorRepository;
use App\Repositories\UserRepository;
use App\Utils\StudentManagementConst;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentsController extends Controller
{
    private UserRepository $userRepo;
    private MajorRepository $majorRepo;

    public function __construct(UserRepository $userRepo, MajorRepository $majorRepo)
    {
        $this->userRepo = $userRepo;
        $this->majorRepo = $majorRepo;
    }

    public function newStudent(Request $rq) {
        $user = [
            'fullName' => $rq->fullName,
            'phoneNumber' => $rq->phone,
            'dob' => $rq->dob,
            'gender' => $rq->gender,
            'identityCard' => $rq->identityCard,
            'classCode' => $rq->classCode,
            'departmentId' => $rq->department,
            'permanentAddress' => $rq->permanentAddress,
            'temporaryAddress' => $rq->temporaryAddress,
            'image' => $rq->image,
            'roleId' => 'role01',
            'yearNum' => $rq->yearNum,
            'major' => $rq->major,
        ];
        try {
            $major = $this->majorRepo->findById($user['major']);
            $studentCode = $this->buildStudentCode($user['yearNum'], $major->majorTimeTraining, $user['departmentId']);
            $user['userId'] = $studentCode;
            $user['email'] = $studentCode.StudentManagementConst::PREFIX_EMAIL;
            $user['password'] = Hash::make($rq->phone);
            $user  = Utils::removeNullOrEmptyElementInArray($user);
            $this->userRepo->create($user);
        } catch (\Exception $e) {
            Log::error('Error when create new student: '. $e->getMessage());
            return redirect()->back()->with('alert', 'register01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    public function deleteStudent(Request $request) {
        $id = $request->id;
        try {
            $this->userRepo->update($id, ['active' => false]);
        } catch (\Exception $e) {
            Log::error('Error when de-active info student: '. $e->getMessage());
            return redirect()->back()->with('alert', 'delete01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    public function updateStudent(Request $request) {
        $user = [
            'fullName' => $request->fullName,
            'phoneNumber' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'identityCard' => $request->identityCard,
            'classCode' => $request->classCode,
            'department' => $request->department,
            'permanentAddress' => $request->permanentAddress,
            'temporaryAddress' => $request->temporaryAddress,
            'image' => $request->image
        ];
        try {
            $this->userRepo->update($request->id, Utils::removeNullOrEmptyElementInArray($user));
        } catch (\Exception $e) {
            Log::error('Error when update info student: '. $e->getMessage());
            return redirect()->back()->with('alert', 'update01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    private function buildStudentCode($numYear, $trainingTime, $departmentCode) {
        $allStudent = $this->userRepo->getListStudentByDepartmentCode($departmentCode);
        $studentSize = count($allStudent) + 1;
        if ($studentSize < 10) {
            $studentSize = '000'.$studentSize;
        } else if($studentSize < 100) {
            $studentSize = '00'.$studentSize;
        }else if ($studentSize > 100 && $studentSize < 1000){
            $studentSize = '0'.$studentSize;
        }
        if ($departmentCode < 10) {
            $departmentCode = '00'.$departmentCode;
        } else if ($departmentCode > 10 && $departmentCode < 100 ) {
            $departmentCode = '0'.$departmentCode;
        }
        return ''.$numYear.$trainingTime.$departmentCode.$studentSize;
    }
}
