<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    //
    public function Logout(Request $request)
    {
        if($request->session()->has('acct_no'))
        {
            $request->session()->forget('acct_no');
            $request->session()->flush();
            $request->session()->save();
            return redirect()->intended('/');
        }
    }
}
