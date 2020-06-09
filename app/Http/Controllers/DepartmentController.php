<?php

namespace App\Http\Controllers;

use App\Repositories\DepartmentRepository;
use App\Utils\StudentManagementConst;
use App\Utils\Utils;
use Hamcrest\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    private $departmentRepo;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepo = $departmentRepo;

    }

    public function getDepartments() {
        return $this->departmentRepo->getAll();
    }

    public function deleteDepartment(Request $rq) {
        $id = $rq->id;
        try {
            $this->departmentRepo->inActive($id);
        } catch (\Exception $e) {
            Log::error('Error when de-active department: '. $e->getMessage());
            return redirect()->back()->with('alert', 'delete01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    public function updateDepartment(Request $rq) {
        $id = $rq->id;
        $department = [
            'departmentName' => $rq->departmentName,
            'active' => strcasecmp($rq->active, StudentManagementConst::ON) == 0,
        ];
        try {
            $this->departmentRepo->update($id, Utils::removeNullOrEmptyElementInArray($department));
        } catch (\Exception $e) {
            Log::error('Error when de-active department: ' . $e->getMessage());
            return redirect()->back()->with('alert', 'delete01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    public function createDepartment(Request $rq) {
        Log::info('Start create new department: ' . $rq->departmentName);
        $department = [
            'departmentName' => $rq->departmentName,
            'active' => strcasecmp($rq->active, StudentManagementConst::ON) == 0,
        ];
        try {
            $this->departmentRepo->create(Utils::removeNullOrEmptyElementInArray($department));
        } catch (\Exception $e) {
            Log::error('Error when create new department: ' . $e->getMessage());
            return redirect()->back()->with('alert', 'create01');
        } finally {
            Log::info('End create new department: ' . $rq->departmentName);
        }
        return redirect()->back()->with('alert', 'success');
    }
}
