<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Models\Teacher;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|string|email',
//            'password' => 'required|string'
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        $creeds = $request->only('email', 'password');
//
//        if (Auth::guard('web')->attempt($creeds)) {
//            $request->session()->regenerate();
//            return $this->redirect($request);
//        }
//
//        return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password']);

        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
        } else {
            $admin = User::where('email', request('email'))->first();
            if ($admin) {
                if (Hash::check(request('password'), $admin->password)) {
                    if ($admin->status === 'deactivate') {
                        return redirect()->back()
                            ->withErrors(['errors' => 'You are not allowed to access this page, please contact the administration'])
                            ->withInput();
                    }

                    $creeds = $request->only('email', 'password');
                    if (Auth::guard('web')->attempt($creeds)) {
                        $request->session()->regenerate();
                        return redirect(RouteServiceProvider::HOME);
                    }

                } else {
                    return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
            }
        }
    }

    public function teacherLogin(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'email' => 'required|string|email',
//            'password' => 'required|string'
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        $creeds = $request->only('email', 'password');
//
//        if (Auth::guard('teacher')->attempt($creeds)) {
//            $request->session()->regenerate();
////            return $this->redirect($request);
//        }
//
//        return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password']);

        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
        } else {
            $teacher = Teacher::where('email', request('email'))->first();
            if ($teacher) {
                if (Hash::check(request('password'), $teacher->password)) {
                    if ($teacher->blocked === 'yes') {
                        return redirect()->back()
                            ->withErrors(['errors' => 'You are not allowed to access this page, please contact the administration'])
                            ->withInput();
                    }

                    $creeds = $request->only('email', 'password');
                    if (Auth::guard('teacher')->attempt($creeds)) {
                        $request->session()->regenerate();
                        return redirect(RouteServiceProvider::TEACHER);
                    }

                } else {
                    return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['errors' => 'Invalid Email Or Password'])->withInput();
            }
        }
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
