<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    function getlogin()
    {
        return view('admin.login');
    }

    function postlogin(AdminRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('users.index');
        } else {
            return redirect('admin/login')->with('error', 'Tài khoản hoặc mật khẩu không tồn tại');
        }
    }

    function logout()
    {
        return redirect('admin/login');
    }
}
