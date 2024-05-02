<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\models\account;
use App\models\business;
use App\Models\bus_acct;

class BusRegisterController extends Controller
{
    //
    public function BusRegPage()
    {
        return view('bus_register');
    }
    
    public function BusRegister(Request $request)
    {
        $emailCheck['email'] = $request->email;
        $rules = array('email' => 'unique:accounts,email');
        
        $validator = Validator::make($emailCheck, $rules);
        
        if($validator->fails())
        {
            $request->session()->flash('failure', 'failed');
            return redirect('customerRegisterPage');
        }
        else
        {
            $newRegistration = new account;
            $userID = account::max('acct_no') + 1;
            $newRegistration->acct_no = $userID;
            $newRegistration->email = $request->email;
            $newRegistration->password = Hash::make($request->password);
            $newRegistration->save();
            

            $newCustomer = new business;
            $busNo = business::max('id') + 1;
            $newCustomer->id = $busNo;
            $newCustomer->name = $request->bus_name;
            $newCustomer->save();

            $newCustAcct = new bus_acct;
            $newCustAcct->bus_id = $busNo;
            $newCustAcct->acct_no = $userID;
            $newCustAcct->save();
            
            $request->session()->put('acct_no', $userID);
            $request->session()->flash('success', 'succeeded');
            session()->save();
            return redirect('businessRegisterPage');
        }
    }
}
