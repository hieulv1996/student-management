<?php


namespace App\Http\Controllers;


use App\Repositories\DepartmentRepository;
use App\Repositories\MajorRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use NumberFormatter;

class RenderController
{
    private $userRepo;
    private $departmentRepo;
    private $majorRepo;

    public function __construct(UserRepository $userRepo, DepartmentRepository $departmentRepo,
                                MajorRepository $majorRepo)
    {
        $this->userRepo = $userRepo;
        $this->departmentRepo = $departmentRepo;
        $this->majorRepo = $majorRepo;
    }

    public function getDashboard()
    {
        return view("pages.Home");
    }

    public function getLoginPage()
    {
        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view("pages.Login");
    }

    public function getRegisterPage()
    {
        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view("pages.Register");
    }

    public function getForgetPasswordPage()
    {
        if (Auth::check()) {
            return redirect("dashboard");
        }
        return view("pages.ForgotPassword");
    }

    public function getStudentManagementPage()
    {
        return view('pages.StudentManagement', [
            'users' => $this->userRepo->getListStudentAccount(),
            'departments' => $this->departmentRepo->getActiveDepartment(),
            'majors' => $this->majorRepo->getAll(),
        ]);
    }

    public function getSchoolRegistration()
    {
        $tinh = $this->getLocations();
        return view('pages.SchoolRegistrationPage', ['locations' => $tinh]);
    }

    public function getLocations() {
        $path = storage_path() . "/json/location.json";
        $data = file_get_contents($path);
        $data = array(json_decode($data));
        $locations = $data[0][0];
        $tinh = array();
        foreach ($locations as $key => $val) {
            array_push($tinh, $key);
        }
        return $tinh;
    }

    public function getDepartmentManagementPage() {
        $departments = $this->departmentRepo->getAll();
        $departments = $departments->map(function ($department)  {
            $students = $this->userRepo->getListStudentByDepartmentCode($department['id']);
            $department['studentSize'] = count($students);
            return $department;
        })->toArray();
        return view("pages.DepartmentManagement", ['departments' => $departments]);
    }

    public function getMajorManagementPage() {
        $majors = $this->majorRepo->getAll();
        $department = $this->departmentRepo->getAll();
        $majors = collect($majors)->map(function ($major) {
            $major['majorCostPerCredit'] = number_format( $major['majorCostPerCredit'],  0) ;
            $department = $this->departmentRepo->findById($major['departmentId']);
            $major['departmentName'] = $department->departmentName;
            $students = $this->userRepo->getStudentByMajorId($major['id']);
            $major['studentSize'] = count($students);
            return $major;
        })->toArray();
        return view("pages.MajorManagement", ['majors' => $majors, 'departments' => $department]);
    }
}
