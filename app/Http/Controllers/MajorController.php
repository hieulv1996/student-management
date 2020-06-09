<?php

namespace App\Http\Controllers;

use App\Repositories\MajorRepository;
use App\Utils\StudentManagementConst;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MajorController extends Controller
{
    private MajorRepository $majorRepo;

    public function __construct(MajorRepository $majorRepo)
    {
        $this->majorRepo = $majorRepo;
    }

    public function createMajor(Request $rq) {
        $major = [
            'majorName' => $rq->majorName,
            'departmentId' => $rq->departmentId,
            'active' => strcasecmp($rq->active, StudentManagementConst::ON) == 0,
            'majorTimeTraining' => $rq->majorTimeTraining,
            'majorCostPerCredit' => $rq->majorCostPerCredit,
            'majorCode' => $rq->majorCode
        ];
        try {
            $this->majorRepo->create(Utils::removeNullOrEmptyElementInArray($major));
        } catch (\Exception $e) {
            Log::error('Error when create new major: ' . $e->getMessage());
            return redirect()->back()->with('alert', 'create01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    public function deleteMajor(Request $rq) {
        $id = $rq->id;
        try {
            $this->majorRepo->delete($id);
        } catch (\Exception $e) {
            Log::error('Error when delete major: ' . $e->getMessage());
            return redirect()->back()->with('alert', 'delete01');
        }
        return redirect()->back()->with('alert', 'success');
    }

    public function updateMajor(Request $rq) {
        $major = [
            'majorName' => $rq->majorName,
            'departmentId' => $rq->departmentId,
            'active' => strcasecmp($rq->active, StudentManagementConst::ON) == 0,
            'majorTimeTraining' => $rq->majorTimeTraining,
            'majorCostPerCredit' => $rq->majorCostPerCredit,
        ];
        try {
            $this->majorRepo->update($rq->id,Utils::removeNullOrEmptyElementInArray($major));
        } catch (\Exception $e) {
            Log::error('Error when update major: ' . $e->getMessage());
            return redirect()->back()->with('alert', 'update01');
        }
        return redirect()->back()->with('alert', 'success');
    }
}
