<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\models\account;

class LoginController extends Controller {

    //

    public function Authenticate(Request $request): RedirectResponse {
        
        if (DB::table('accounts')->where('email', $request->email)->exists()) {
            $query = DB::table('accounts')->where('email', $request->email)->first();

//        if (Hash::needsRehash($pass))
//        {
//            $pass = Hash::make($request->password);
//        }
            if (Hash::check($request->password, $query->password)) {
                $userID = DB::table('accounts')->where('email', $request->email)->pluck('acct_no');

                $request->session()->put('acct_no', $userID);
                session()->save();
                return redirect()->intended('dashboard');
            }
        }
//        $this->attributes['password'] = Hash::make($request->password);
//        $credentials = $request->validate([ 'email' => ['required', 'email'], 'password' => ['required'], ]);
//        
//        \Log::info('RECEIVED');
//        \Log::info(json_encode($credentials['password']));
//        if(Auth::attempt($credentials))
//        {
//            $request->session()->regenerate();
//            
//            return redirect()->intended('dashboard');
//        }
//        return redirect('customerRegisterPage');
        $request->session()->flash('loginFailure', 'failed');
        return back()->withErrors(['email' => 'The provided credentials do not match our records.',])->onlyInput('email');
    }
}
