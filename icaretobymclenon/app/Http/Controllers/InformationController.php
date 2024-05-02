<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\customers;

class InformationController extends Controller
{
    //
    public function UpdateInfoPage(Request $request)
    {
        $acctNo = session()->get('acct_no');
        $custEntry = DB::table('cust_accts')->where('acct_no', $acctNo)->first();
        $custId = $custEntry->cust_id;
        $cust = DB::table('customers')->where('id', $custId)->select('first_name', 'last_name', 'address', 'email', 'phone_no')->get();
        return view('update_info')->with(array('cust' => $cust));
    }
    
    public function UpdateInfo(Request $request)
    {
        $acctNo = session()->get('acct_no');
        
        DB::table('accounts')->where('acct_no', $acctNo)->update(['email' => $request->email]);
        
        $custEntry = DB::table('cust_accts')->where('acct_no', $acctNo)->first();
        $custId = $custEntry->cust_id;
        
        
//        switch ($request->input('action')) {
//            case 'Add Mortgage':
//                session()->put('show_mortgage', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case 'Remove Mortgage':
//                session()->forget('show_mortgage');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Add Home Owners' Insurance":
//                session()->put('show_insurance', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Remove Insurance":
//                session()->forget('show_insurance', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Add Internet":
//                session()->put('show_internet', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Remove Internet":
//                session()->forget('show_internet');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Add Cleaning":
//                session()->put('show_cleaning', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Remove Cleaning":
//                session()->forget('show_cleaning');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Add Land":
//                session()->put('show_landscape', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Remove Land":
//                session()->forget('show_landscape');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Add Phones":
//                session()->put('show_phone', 'true');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case "Remove Phones":
//                session()->forget('show_phone');
//                session()->save();
//                return redirect('/updateInfoPage')->withInput();
//
//            case 'Register': {
//                    session()->put('success', 'updated');
//                }
//        }
        
        DB::table('customers')->where('id', $custId)->update(['first_name' => $request->first_name]);
        DB::table('customers')->where('id', $custId)->update(['last_name' => $request->last_name]);
        DB::table('customers')->where('id', $custId)->update(['address' => $request->address]);
        DB::table('customers')->where('id', $custId)->update(['email' => $request->email]);
        DB::table('customers')->where('id', $custId)->update(['phone_no' => $request->phone_no]);
        
        
        $cust = DB::table('customers')->where('id', $custId)->select('first_name', 'last_name', 'address', 'email', 'phone_no')->get();
        
        
        
        
        
        
        
        
        
        
        
//        if ($request->session()->has('show_mortgage')) {
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => 'Mortgage', 'has_service' => true, 'looking' => (($request->mort_looking == 'looking') ? true : false), 'current_cost' => $request->mort_cost, 'contract_exp' => $request->mort_month . ' ' . $request->mort_year, 'description' => "None", 'quantity' => 1]);
////            $newService->cust_id = $custId;
////            $newService->service_type = 'Mortgage';
////            $newService->has_service = true;
////            $newService->looking = (($request->mort_looking == 'looking') ? true : false);
////            $newService->current_cost = $request->mort_cost;
////            $newService->contract_exp = $request->mort_month . ' ' . $request->mort_year;
////            $newService->description = "None";
////            $newService->quantity = 1;
//
//            //->updateOrInsert(['cust_id', 'service_type', 'has_service', 'looking', 'current_cost', 'contract_exp', 'description', 'quantity'], [$custId, 'Mortgage', true, (($request->mort_looking == 'looking') ? true : false), $request->mort_cost, $request->mort_month . ' ' . $request->mort_year, "None", 1]);
//            //$newService->save();
//        } else {
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => 'Mortgage', 'has_service' => false, 'looking' => (($request->mort_looking == 'looking') ? true : false), 'current_cost' => 0, 'contract_exp' => "None", 'description' => "None", 'quantity' => 0]);
////            $newService->cust_id = $custId;
////            $newService->service_type = 'Mortgage';
////            $newService->has_service = false;
////            $newService->looking = (($request->mort_looking == 'looking') ? true : false);
////            $newService->current_cost = 0;
////            $newService->contract_exp = "None";
////            $newService->description = "None";
////            $newService->quantity = 0;
//
//            //$newService->save();
//        }
//
//        if ($request->session()->has('show_insurance')) {
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => 'Insurance', 'has_service' => true, 'looking' => (($request->ins_looking == 'looking') ? true : false), 'current_cost' => $request->ins_cost, 'contract_exp' => "None", 'description' => "None", 'quantity' => 1]);
////            $newService->cust_id = $custId;
////            $newService->service_type = 'Insurance';
////            $newService->has_service = true;
////            $newService->looking = (($request->ins_looking == 'looking') ? true : false);
////            $newService->current_cost = $request->ins_cost;
////            $newService->contract_exp = "None";
////            $newService->description = "None";
////            $newService->quantity = 1;
//
//            //$newService->save();
//        } else {
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => 'Insurance', 'has_service' => false, 'looking' => (($request->ins_looking == 'looking') ? true : false), 'current_cost' => 0, 'contract_exp' => "None", 'description' => "None", 'quantity' => 0]);
////            $newService->cust_id = $custId;
////            $newService->service_type = 'Insurance';
////            $newService->has_service = false;
////            $newService->looking = (($request->ins_looking == 'looking') ? true : false);
////            $newService->current_cost = 0;
////            $newService->contract_exp = "None";
////            $newService->description = "None";
////            $newService->quantity = 0;
//
//            //$newService->save();
//        }
//
//        if ($request->session()->has('show_internet')) {
//            //$newService = new current_services;
//            //$newService->cust_id = $custId;
//            //$newService->service_type = $request->speed . "_" . "Internet";
//            //$newService->has_service = true;
//            //$newService->looking = (($request->int_looking == 'looking') ? true : false);
//            //$newService->current_cost = $request->int_cost;
//
//            $contract = null;
//            if (!empty($request->int_month) and !empty($request->int_year)) {
//                $contract = $request->int_month . ' ' . $request->int_year;
//            } else {
//                $contract->contract_exp = "None";
//            }
//
//            //$newService->description = $request->devices;
//            //$newService->quantity = 1;
//
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => $request->speed . "_" . "Internet", 'has_service' => true, 'looking' => (($request->int_looking == 'looking') ? true : false), 'current_cost' => $request->int_cost, 'contract_exp' => $contract, 'description' => $request->devices, 'quantity' => 1]);
//                
//            //$newService->save();
//
//            if ($request->speed != "25GB") {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = "25GB_Internet";
////                $newService->has_service = false;
////                $newService->looking = false;
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "25GB_Internet", 'has_service' => false, 'looking' => false, 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//                
////                $newService->save();
//            }
//            if ($request->speed != "50GB") {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = "50GB_Internet";
////                $newService->has_service = false;
////                $newService->looking = false;
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//                
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "50GB_Internet", 'has_service' => false, 'looking' => false, 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//
////                $newService->save();
//            }
//            if ($request->speed != "100GB") {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = "100GB_Internet";
////                $newService->has_service = false;
////                $newService->looking = false;
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//                
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "100GB_Internet", 'has_service' => false, 'looking' => false, 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//
////                $newService->save();
//            }
//        } else {
//
//            if (!empty($request->speed)) {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = $request->speed . "_" . "Internet";
////                $newService->has_service = false;
////                $newService->looking = (($request->int_looking == 'looking') ? true : false);
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//                
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => $request->speed . "_" . "Internet", 'has_service' => false, 'looking' => (($request->int_looking == 'looking') ? true : false), 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//
////                $newService->save();
//            }
//            if ($request->speed != "25GB") {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = "25GB_Internet";
////                $newService->has_service = false;
////                $newService->looking = false;
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//                
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "25GB_Internet", 'has_service' => false, 'looking' => false, 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//
////                $newService->save();
//            }
//            if ($request->speed != "50GB") {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = "50GB_Internet";
////                $newService->has_service = false;
////                $newService->looking = false;
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//                
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "50GB_Internet", 'has_service' => false, 'looking' => false, 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//
////                $newService->save();
//            }
//            if ($request->speed != "100GB") {
////                $newService = new current_services;
////                $newService->cust_id = $custId;
////                $newService->service_type = "100GB_Internet";
////                $newService->has_service = false;
////                $newService->looking = false;
////                $newService->current_cost = 0;
////                $newService->contract_exp = "None";
////                $newService->description = $request->devices;
////                $newService->quantity = 0;
//                
//                
//               $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "100GB_Internet", 'has_service' => false, 'looking' => false, 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => 0]);
//                
//
////                $newService->save();
//            }
//        }
//
//        if ($request->session()->has('show_cleaning')) {
////            $newService = new current_services;
////            $newService->cust_id = $custId;
////            $newService->service_type = "Cleaning";
////            $newService->has_service = true;
////            $newService->looking = (($request->clean_looking == 'looking') ? true : false);
////            $newService->current_cost = $request->clean_cost;
////            
////            $contract = null;
////            
////            if (!empty($request->clean_month) and !empty($request->clean_year)) {
////                $newService->contract_exp = $request->clean_month . ' ' . $request->clean_year;
////            } else {
////                $newService->contract_exp = "None";
////            }
////            $newService->description = $request->beds . " Beds; " . $request->baths . " Baths";
////            $newService->quantity = $request->sq_ft;
//
//            $uploadName = $userId . "floorPlan.png";
//            Storage::disk('local')->put($uploadName, $request->floor_plan);
//            
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Cleaning", 'has_service' => true, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => $request->clean_cost, 'contract_exp' => $contract, 'description' => $request->beds . " Beds; " . $request->baths . " Baths", 'quantity' => $request->sq_ft]);
//
////            $newService->save();
//        } else {
////            $newService = new current_services;
////            $newService->cust_id = $custId;
////            $newService->service_type = 'Cleaning';
////            $newService->has_service = false;
////            $newService->looking = (($request->clean_looking == 'looking') ? true : false);
////            $newService->current_cost = 0;
////            $newService->contract_exp = "None";
////            $newService->description = $request->beds . " Beds; " . $request->baths . " Baths";
////            $newService->quantity = $request->sq_ft;
//
//            $fileUpload = $request->file(key: "floor_plan");
//            //$img = $fileUpload->getRealPath();
////            \Log::info(json_encode($fileUpload));
////            \Log::info(json_encode($fileUpload->getClientOriginalName()));
//            $path = $fileUpload->getRealPath();
//            //$extension = $request->floor_plan->extension();
////            \Log::info(json_encode($path));
//            $uploadName = "User" . $custId . "floorPlan.png";
//            //$path = $request->floor_plan->storeAs('images', $uploadName);
//            Storage::disk('local')->put($uploadName, $fileUpload);
//            
//            
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Cleaning", 'has_service' => false, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => $request->clean_cost, 'contract_exp' => "None", 'description' => $request->beds . " Beds; " . $request->baths . " Baths", 'quantity' => $request->sq_ft]);
//            
//
////            $newService->save();
//        }
//
//        if ($request->session()->has('show_landscape')) {
////            $newService = new current_services;
////            $newService->cust_id = $custId;
////            $newService->service_type = "Lawn_Care";
////            $newService->has_service = true;
////            $newService->looking = (($request->land_looking == 'looking') ? true : false);
////            $newService->current_cost = $request->land_cost;
////            
//            $contract = null;
////            
//            if (!empty($request->land_month) and !empty($request->land_year)) {
////                $newService->contract_exp = $request->land_month . ' ' . $request->land_year;
//                $contract = $request->land_month . ' ' . $request->land_year;
//            } else {
////                $newService->contract_exp = "None";
//                $contract = "None";
//            }
////            $newService->description = "None";
////            $newService->quantity = $request->land_sq_ft;
//
//            $uploadName = $custId . "floorPlan.png";
//            Storage::disk('local')->put($uploadName, $request->floor_plan);
//            
//             $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Lawn_Care", 'has_service' => true, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => $request->land_cost, 'contract_exp' => $contract, 'description' => $request->beds . " Beds; " . $request->baths . " Baths", 'quantity' => $request->land_sq_ft]);
//
////            $newService->save();
//        } else {
////            $newService = new current_services;
////            $newService->cust_id = $custId;
////            $newService->service_type = 'Lawn_Care';
////            $newService->has_service = false;
////            $newService->looking = (($request->land_looking == 'looking') ? true : false);
////            $newService->current_cost = 0;
////            $newService->contract_exp = "None";
////            $newService->description = "None";
////            $newService->quantity = $request->land_sq_ft;
//            
//            
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Lawn_Care", 'has_service' => false, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => 0, 'contract_exp' => "None", 'description' => "None", 'quantity' => $request->land_sq_ft]);
//            
//
////            $newService->save();
//        }
//
//        if ($request->session()->has('show_phone')) {
////            $newService = new current_services;
////            $newService->cust_id = $custId;
////            $newService->service_type = "Phone_Line";
////            $newService->has_service = true;
////            $newService->looking = (($request->phone_looking == 'looking') ? true : false);
////            $newService->current_cost = $request->phone_cost;
////            
////            $contract = null;
////            
////            $contract = null;
////            
//            if (!empty($request->phone_month) and !empty($request->phone_year)) {
////                $newService->contract_exp = $request->land_month . ' ' . $request->land_year;
//                $contract = $request->phone_month . ' ' . $request->phone_year;
//            } else {
////                $newService->contract_exp = "None";
//                $contract = "None";
//            }
////            $newService->description = "None";
////            $newService->quantity = $request->num_service;
////            $newNonService->description = $request->devices;
//            
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Phone_Line", 'has_service' => true, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => $request->phone_cost, 'contract_exp' => $contract, 'description' => $request->devices, 'quantity' => $request->num_service]);
//
////            $newService->save();
//
//            if (($request->num_phones - $request->num_service) > 0) {
////                $newNonService = new current_services;
////                $newNonService->cust_id = $custId;
////                $newNonService->service_type = "Phone_Line";
////                $newNonService->has_service = false;
////                $newNonService->looking = (($request->phone_looking == 'looking') ? true : false);
////                $newNonService->current_cost = 0;
////                $newNonService->contract_exp = "None";
////                $newNonService->description = "None";
////                $newNonService->quantity = $request->num_phones - $request->num_service;
////                $newNonService->description = $request->devices;
//                
//                
//                $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Phone_Line", 'has_service' => false, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => $request->num_phones - $request->num_service]);
//                
////                $newNonService->save();
//            }
//        } else {
////            $newService = new current_services;
////            $newService->cust_id = $custId;
////            $newService->service_type = "Phone_Line";
////            $newService->has_service = false;
////            $newService->looking = (($request->phone_looking == 'looking') ? true : false);
////            $newService->current_cost = 0;
////            $newService->contract_exp = "None";
////            $newService->description = "None";
////            $newService->quantity = $request->num_phones;
////            $newService->description = $request->devices;
//            
//            
//            $newService = DB::table('current_services')->updateOrInsert(['cust_id' => $custId], ['cust_id' => $custId, 'service_type' => "Phone_Line", 'has_service' => false, 'looking' => (($request->clean_looking == 'looking') ? true : false), 'current_cost' => 0, 'contract_exp' => "None", 'description' => $request->devices, 'quantity' => $request->num_phones - $request->num_phones]);
//
////            $newService->save();
//        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
//        if ($request->action == "Register")
//        {
            session()->put('success', 'updated');
//        }
        
        return redirect('/updateInfoPage')->with(array('cust' => $cust));
    }
}
