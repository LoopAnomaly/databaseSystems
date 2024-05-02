<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\models\account;
use App\models\customer;
use App\Models\cust_acct;

class CustomerRegisterController extends Controller
{
    //
    public function CustRegPage()
    {
        return view('register');
    }
    
    public function CustRegister(Request $request)
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
//            $current_acct=DB::select("SHOW TABLE STATUS LIKE 'customers'");
//            $this_acct=$current_acct[0]->Auto_increment;

            $newRegistration = new account;
            $userID = account::max('acct_no') + 1;
            $newRegistration->acct_no = $userID;
            $newRegistration->email = $request->email;
            $newRegistration->password = Hash::make($request->password);
            $newRegistration->save();

//            $current_cust=DB::select("SHOW TABLE STATUS LIKE 'customers'");
//            $this_cust=$current_cust[0]->Auto_increment;

            $newCustomer = new customer;
            $custNo = customer::max('id') + 1;
            $newCustomer->id = $custNo;
            $newCustomer->first_name = $request->first_name;
            $newCustomer->last_name = $request->last_name;
            $newCustomer->address = $request->address;
            $newCustomer->email = $request->email;
            $newCustomer->phone_no = $request->phone_no;
            $newCustomer->save();

            $newCustAcct = new cust_acct;
            $newCustAcct->cust_id = $custNo;
            $newCustAcct->acct_no = $userID;
            $newCustAcct->save();
            
            $request->session()->put('acct_no', $userID);
            $request->session()->flash('success', 'succeeded');
            session()->save();
            return redirect('customerRegisterPage');
        }
    }
}
