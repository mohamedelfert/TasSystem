<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    use AuthTrait;

    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        if (Auth::guard($this->checkGuard($request))->attempt(['email' => $request->email, 'password' => $request->password],
            $request->get('remember'))) {

            $request->session()->regenerate();
            return $this->redirect($request);

        } else {
            toast('Login Failed, Try Again!','error');
            return redirect()->back();
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request, $type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
