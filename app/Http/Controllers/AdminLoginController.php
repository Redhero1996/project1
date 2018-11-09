<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Auth;
use Session;

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
            return redirect('admin/login')->with('error', __('translate.error'));
        }
    }

    function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('admin/login');
    }
}
