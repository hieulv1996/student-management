<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('PublicLayout');
});

Route::get('/login', [
    "as" => "login",
    "uses" => "RenderController@getLoginPage"
]);

Route::post('/api/login', [
    "as" => "api-login",
    "uses" => "SecurityController@loginController"
]);


Route::get('/register', [
    "as" => "register",
    "uses" => "RenderController@getRegisterPage"
]);

Route::get('/forget-password', [
    "as" => "forget-password",
    "uses" => "RenderController@getForgetPasswordPage"
]);

Route::get('/dang-ky-xet-tuyen', [
    "as" => "dang_ky_xet_tuyen",
    "uses" => "RenderController@getSchoolRegistration"
]);

Route::get('/api/locations', [
    "as" => "api-get-locations",
    "uses" => "Controller@getLocations"
]);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [
        "as" => "dashboard",
        "uses" => "RenderController@getDashboard"
    ]);
    Route::get('/student-management', [
        "as" => "studentManagement",
        "uses" => "RenderController@getStudentManagementPage"
    ]);

    Route::get('/department-management', [
        "as" => "departmentManagement",
        "uses" => "RenderController@getDepartmentManagementPage"
    ]);

    Route::get('/major-management', [
        "as" => "majorManagement",
        "uses" => "RenderController@getMajorManagementPage"
    ]);


    Route::get('/api/logout', [
        "as" => "api-logout",
        "uses" => "SecurityController@logoutController"
    ]);

    Route::get('/api/student', [
        "as" => "api-get-student",
        "uses" => "UserController@getUsers"
    ]);

    Route::post('/api/student', [
        "as" => "api-post-student",
        "uses" => "StudentsController@newStudent"
    ]);

    Route::post('/api/delete-student', [
        "as" => "api-delete-student",
        "uses" => "StudentsController@deleteStudent"
    ]);

    Route::post('/api/update-student', [
        "as" => "api-update-student",
        "uses" => "StudentsController@updateStudent"
    ]);

    Route::post('/api/delete-department', [
        "as" => "api-delete-department",
        "uses" => "DepartmentController@deleteDepartment"
    ]);

    Route::post('/api/update-department', [
        "as" => "api-update-department",
        "uses" => "DepartmentController@updateDepartment"
    ]);

    Route::post('/api/department', [
        "as" => "api-create-department",
        "uses" => "DepartmentController@createDepartment"
    ]);

    Route::post('/api/major', [
        "as" => "api-create-major",
        "uses" => "MajorController@createMajor"
    ]);

    Route::post('/api/delete-major', [
        "as" => "api-delete-major",
        "uses" => "MajorController@deleteMajor"
    ]);

    Route::post('/api/update-major', [
        "as" => "api-update-major",
        "uses" => "MajorController@updateMajor"
    ]);
});

