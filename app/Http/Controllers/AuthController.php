<?php

namespace App\Http\Controllers;

// use App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login ()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request -> validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        //buat cek user sudah login
         
        if (Auth::attempt($credentials)){
            //buat cek status active atau bukan
           if(Auth::user()->status != 'active')
           {

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Session::flash('status', 'failed');
            Session::flash('messege', 'Your Accont is not Active yet. Please contact admin');
            return redirect('login');
           }

            $request->session()->regenerate();
           //cek apakah dia admin
           if(Auth::user()->roles_id == 1)
           {
            return redirect('dashboard');
           }
           // apakah dia client
           if(Auth::user()->roles_id == 2)
           {
            return redirect('profile');
           }
        }
         
        //kalau gagal login
        Session::flash('status', 'failed');
        Session::flash('messege', 'Invalid Login');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }

    public function regis(Request $request)
    {
        //validate masuk atau tidk
        $validated = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:5',
            'phone' => 'required|max:13',
            'address' => 'required|max:255',
        ]);

       $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('messege', 'Regist Success! Please, Wait Admin to approve');
        return redirect('register');

    }
}
