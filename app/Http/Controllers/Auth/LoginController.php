<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\LoginLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
            $request->session()->regenerate();

            LoginLog::create([
                'user_id' => Auth::id(),
                'ip' => $request->ip(),
                'timestamp' => Carbon::now()->timestamp,
                'is_succeeded' => true
            ]);
            return redirect()->route('home');
        } else {
            LoginLog::create([
                'user_id' => Auth::id(),
                'ip' => $request->ip(),
                'timestamp' => Carbon::now()->timestamp,
                'is_succeeded' => false
            ]);
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }

    }

    public function register(Request $request)
    {
        $user = User::where('username', $request->get('username'))
            ->orWhere('email', $request->get('email'))
            ->first();
        if ($user) {
            $this->setFlash('error', 'Kullanici ad ve mail kullanilamaz !');
        }

        LoginLog::create([
            'user_id' => Auth::id(),
            'ip' => $request->ip(),
            'timestamp' => Carbon::now()->timestamp,
            'is_succeeded' => true
        ]);

        $user = User::create([
            'type_id' => 4,
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        Auth::login($user);

        return Redirect::route('home');
    }

    private function setFlash($type, $message)
    {
        Session::flash('message', $message);
        Session::flash('type', $type);
    }

    public function loginUI(Request $request)
    {
        if (Auth::user()) {
            return Redirect::route('home');
        }
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}

