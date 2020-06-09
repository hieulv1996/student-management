<?php

namespace App\Http\Controllers;

use App\Utils\StudentManagementConst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function loginController(Request $request)
    {
        $email = $request->email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = $email.StudentManagementConst::PREFIX_EMAIL;
        }
        $credentials = ['email' => $email, 'password' => $request->password];
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        } else {
            return redirect('login')->with('alert', 'Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function logoutController()
    {
        Auth::logout();
        return redirect('login');
    }
}
