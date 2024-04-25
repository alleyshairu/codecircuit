<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Events\StudentLoggedIn;
use Uc\Module\Student\View\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        /**
         * @var User
         */
        $user = Auth::user();
        if ($user->IsStudent()) {
            $student = Student::fromUser($user);
            event(new StudentLoggedIn($student));

            return redirect()->intended(route('student.start', absolute: false));
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
