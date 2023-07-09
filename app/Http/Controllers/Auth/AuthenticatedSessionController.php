<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Handle an incoming authentication request.
     */
    public function adminStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($creds)) {
            $request->session()->regenerate();
            return $this->redirect($request);
        } else {
            return redirect()->back()->with('fail', 'Incorrect credentials');
        }
    }

    public function teacherStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($creds)) {
            $request->session()->regenerate();
            return $this->redirect($request);
        } else {
            return redirect()->back()->with('fail', 'Incorrect credentials');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function adminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function teacherDestroy(Request $request)
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
