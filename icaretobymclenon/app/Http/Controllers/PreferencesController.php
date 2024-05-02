<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\models\account;
use App\models\customer;
use App\Models\cust_acct;
use App\Models\cust_pref;

class PreferencesController extends Controller {

    public function Preferences() {
        $acctNo = session()->get('acct_no');
        $queryCust = DB::table('cust_accts')->where('acct_no', $acctNo)->first();
        $custId = $queryCust->cust_id;
        $custPrefs = DB::table('cust_prefs')->where('cust_id', $custId)->get();

        foreach ($custPrefs as $c) {
            if ($c->service_type == "Mortgage") {
                \Log::info(json_encode($c->contract));
                session()->flash('mort_price', $c->des_price);
                session()->flash('mort_contract', $c->contract);
            } else if ($c->service_type == "Insurance") {
                session()->flash('ins_price', $c->des_price);
                session()->flash('ins_contract', $c->contract);
            } else if ($c->service_type == "25GB_Internet") {
                session()->flash('speed', '25GB');
                session()->flash('int_price', $c->des_price);
                session()->flash('int_contract', $c->contract);
            } else if ($c->service_type == "50GB_Internet") {
                session()->flash('speed', '50GB');
                session()->flash('int_price', $c->des_price);
                session()->flash('int_contract', $c->contract);
            } else if ($c->service_type == "100GB_Internet") {
                session()->flash('speed', '100GB');
                session()->flash('int_price', $c->des_price);
                session()->flash('int_contract', $c->contract);
            } else if ($c->service_type == "Cleaning") {
                session()->flash('clean_price', $c->des_price);
                session()->flash('clean_contract', $c->contract);
            } else if ($c->service_type == "Lawn_Care") {
                session()->flash('land_price', $c->des_price);
                session()->flash('land_contract', $c->contract);
            } else if ($c->service_type == "Phone_Line") {
                session()->flash('phone_price', $c->des_price);
                session()->flash('phone_contract', $c->contract);
            }
        }

        return view('update_preferences');
    }

    //
    public function UpdatePreferences(Request $request) {
        $acctNo = session()->get('acct_no');
        \Log::info(json_encode($acctNo));
        $queryCust = DB::table('cust_accts')->where('acct_no', $acctNo)->first();
        $custId = $queryCust->cust_id;
        $acctNo = $queryCust->acct_no;

        if (!empty($request->mort_price)) {

            $existPref = DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Mortgage')->count();

            if ($existPref >= 1) {
                DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Mortgage')->update(['des_price' => $request->mort_price, 'contract' => (($request->mort_contract == 'looking') ? true : false)]);
            } else {

                $newPreference = new cust_pref;
                $newPreference->cust_id = $custId;
                $newPreference->acct_no = $acctNo;
                $newPreference->service_type = "Mortgage";
                $newPreference->des_price = $request->mort_price;
                $newPreference->contract = (($request->mort_contract == 'looking') ? true : false);
                $newPreference->save();
            }
        }

        if (!empty($request->ins_price)) {
            
            $existPref = DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Insurance')->count();
            
            if ($existPref >= 1) {
                DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Insurance')->update(['des_price' => $request->ins_price, 'contract' => (($request->ins_contract == 'looking') ? true : false)]);
            } else {
                $newPreference = new cust_pref;
                $newPreference->cust_id = $custId;
                $newPreference->acct_no = $acctNo;
                $newPreference->service_type = "Insurance";
                $newPreference->des_price = $request->ins_price;
                $newPreference->contract = (($request->ins_contract == 'looking') ? true : false);
                $newPreference->save();
            }
        }

        if (!empty($request->int_price)) {

            $existPref = DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', '25GB_Internet')->orWhere('service_type', '50GB_Internet')->orWhere('service_type', '100GB_Internet')->count();

            if ($existPref >= 1) {
                DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', '25GB_Internet')->orWhere('service_type', '50GB_Internet')->orWhere('service_type', '100GB_Internet')->update(['des_price' => $request->int_price, 'contract' => (($request->int_contract == 'looking') ? true : false), 'service_type' => $request->speed . "_Internet"]);
            }
            else
            {
                $newPreference = new cust_pref;
                $newPreference->cust_id = $custId;
                $newPreference->acct_no = $acctNo;
                $newPreference->service_type = $request->speed . "_Internet";
                $newPreference->des_price = $request->int_price;
                $newPreference->contract = (($request->int_contract == 'looking') ? true : false);
                $newPreference->save();
            }
        }

        if (!empty($request->clean_price)) {

            $existPref = DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Cleaning')->count();

            if ($existPref >= 1) {
                DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Cleaning')->update(['des_price' => $request->clean_price, 'contract' => (($request->clean_contract == 'looking') ? true : false)]);
            } else {
                $newPreference = new cust_pref;
                $newPreference->cust_id = $custId;
                $newPreference->acct_no = $acctNo;
                $newPreference->service_type = "Cleaning";
                $newPreference->des_price = $request->clean_price;
                $newPreference->contract = (($request->clean_contract == 'looking') ? true : false);
                $newPreference->save();
            }
        }

        if (!empty($request->land_price)) {

            $existPref = DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Lawn_Care')->count();

            if ($existPref >= 1) {
                DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Lawn_Care')->update(['des_price' => $request->land_price, 'contract' => (($request->land_contract == 'looking') ? true : false)]);
            } else {
                $newPreference = new cust_pref;
                $newPreference->cust_id = $custId;
                $newPreference->acct_no = $acctNo;
                $newPreference->service_type = "Lawn_Care";
                $newPreference->des_price = $request->land_price;
                $newPreference->contract = (($request->land_contract == 'looking') ? true : false);
                $newPreference->save();
            }
        }

        if (!empty($request->phone_price)) {

            $existPref = DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Phone_Line')->count();

            if ($existPref >= 1) {
                DB::table('cust_prefs')->where('cust_id', $custId)->where('service_type', 'Phone_Line')->update(['des_price' => $request->phone_price, 'contract' => (($request->phone_contract == 'looking') ? true : false)]);
            } else {
                $newPreference = new cust_pref;
                $newPreference->cust_id = $custId;
                $newPreference->acct_no = $acctNo;
                $newPreference->service_type = "Phone_Line";
                $newPreference->des_price = $request->phone_price;
                $newPreference->contract = (($request->phone_contract == 'looking') ? true : false);
                $newPreference->save();
            }
        }
        return redirect('updatePreferences');
    }
}
