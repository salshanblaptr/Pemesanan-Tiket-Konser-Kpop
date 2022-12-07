<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('login.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $get_username = $request->username;
        $get_password = $request->password;

        //$datas = DB::table('admin')->where('username', 'LIKE', $get_username, 'AND', 'password', 'LIKE', $get_password)->first();
        //$datas = DB::table('admin')->where('username', '=', $get_username, 'AND', 'password', '=', $get_password)->first();
        $usr = DB::table('akun')->where('username', '=', $get_username)->first();
        $pass = DB::table('akun')->where('password', '=', $get_password)->first();

        if(is_null($usr) or is_null($pass))
        {
            return redirect()->route('login.create')->with('danger', 'Failed to Log In!');
        }  
        else{
            return redirect()->route('admin.index')->with('success', 'Welcome!');
        }
    }
}