<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use app\Models\User;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('backend.user.selecttent');
        }
        return view('backend.auth.login');
    }

    public function register()
    {
        return view('backend.auth.register');
    }

    public function checklogin(Request $request)
    {
        request()->validate([
        'login-username' => 'required',
        'login-password' => 'required',
        ]);

        $credentials = $request->only('login-username', 'login-password');
        $setAuth = [
            "username"=>$credentials["login-username"],
            "password"=>$credentials["login-password"],
            "status"=> '1'
        ];
        // return response($setAuth,401);
        // return response()->json($credentials);
        if (Auth::attempt($setAuth,!empty($request->post('login-remember')))) {
            // Authentication passed...
            // return redirect()->intended('dashboard');
            return response()->json(['success'=>'Got Simple Ajax Request.']);
        }else{
            return response(['success'=>'Got Simple Ajax Request.'],401);
        }
        // return redirect()->to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegister(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return redirect()->to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {

      if(Auth::check()){
        return view('dashboard');
      }
       return redirect()->to("login")->withSuccess('Opps! You do not have access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->to('backend/login');
    }
}
