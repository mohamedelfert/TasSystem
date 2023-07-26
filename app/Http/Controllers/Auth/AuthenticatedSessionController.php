<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;

    public function adminLoginForm()
    {
        return view('auth.admin-login');
    }

    public function teacherLoginForm()
    {
        return view('auth.teacher-login');
    }

    public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $creeds = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($creeds)) {
            $request->session()->regenerate();
            return $this->redirect($request);
        }

        return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password']);
    }

    public function teacherLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $creeds = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($creeds)) {
            $request->session()->regenerate();
            return $this->redirect($request);
        }

        return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password']);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function teacherLogout(Request $request)
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
