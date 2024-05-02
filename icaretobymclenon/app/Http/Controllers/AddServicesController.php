<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\models\account;
use App\models\customer;
use App\Models\cust_acct;
use App\Models\current_services;
use App\Models\offered_services;

class AddServicesController extends Controller {

    //
    public function CustRegPage() {
        return view('register');
    }

    private function AddService(Request $request, int $userId) {

        $queryEmail = DB::table('accounts')->where('acct_no', $userId)->first();
        $queryUserId = DB::table('customers')->where('email', $queryEmail->email)->first();
//        \Log::info(json_encode($queryUserId->id));
        $custId = $queryUserId->id;
        \Log::info(json_encode($custId));
        if ($request->session()->has('show_mortgage')) {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = 'Mortgage';
            $newService->has_service = true;
            $newService->looking = (($request->mort_looking == 'looking') ? true : false);
            $newService->current_cost = $request->mort_cost;
            $newService->contract_exp = $request->mort_month . ' ' . $request->mort_year;
            $newService->description = "None";
            $newService->quantity = 1;

            $newService->save();
        } else {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = 'Mortgage';
            $newService->has_service = false;
            $newService->looking = (($request->mort_looking == 'looking') ? true : false);
            $newService->current_cost = 0;
            $newService->contract_exp = "None";
            $newService->description = "None";
            $newService->quantity = 0;

            $newService->save();
        }

        if ($request->session()->has('show_insurance')) {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = 'Insurance';
            $newService->has_service = true;
            $newService->looking = (($request->ins_looking == 'looking') ? true : false);
            $newService->current_cost = $request->ins_cost;
            $newService->contract_exp = "None";
            $newService->description = "None";
            $newService->quantity = 1;

            $newService->save();
        } else {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = 'Insurance';
            $newService->has_service = false;
            $newService->looking = (($request->ins_looking == 'looking') ? true : false);
            $newService->current_cost = 0;
            $newService->contract_exp = "None";
            $newService->description = "None";
            $newService->quantity = 0;

            $newService->save();
        }

        if ($request->session()->has('show_internet')) {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = $request->speed . "_" . "Internet";
            $newService->has_service = true;
            $newService->looking = (($request->int_looking == 'looking') ? true : false);
            $newService->current_cost = $request->int_cost;

            if (!empty($request->int_month) and !empty($request->int_year)) {
                $newService->contract_exp = $request->int_month . ' ' . $request->int_year;
            } else {
                $newService->contract_exp = "None";
            }

            $newService->description = $request->devices;
            $newService->quantity = 1;

            $newService->save();

            if ($request->speed != "25GB") {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = "25GB_Internet";
                $newService->has_service = false;
                $newService->looking = false;
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
            if ($request->speed != "50GB") {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = "50GB_Internet";
                $newService->has_service = false;
                $newService->looking = false;
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
            if ($request->speed != "100GB") {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = "100GB_Internet";
                $newService->has_service = false;
                $newService->looking = false;
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
        } else {

            if (!empty($request->speed)) {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = $request->speed . "_" . "Internet";
                $newService->has_service = false;
                $newService->looking = (($request->int_looking == 'looking') ? true : false);
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
            if ($request->speed != "25GB") {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = "25GB_Internet";
                $newService->has_service = false;
                $newService->looking = false;
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
            if ($request->speed != "50GB") {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = "50GB_Internet";
                $newService->has_service = false;
                $newService->looking = false;
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
            if ($request->speed != "100GB") {
                $newService = new current_services;
                $newService->cust_id = $custId;
                $newService->service_type = "100GB_Internet";
                $newService->has_service = false;
                $newService->looking = false;
                $newService->current_cost = 0;
                $newService->contract_exp = "None";
                $newService->description = $request->devices;
                $newService->quantity = 0;

                $newService->save();
            }
        }

        if ($request->session()->has('show_cleaning')) {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = "Cleaning";
            $newService->has_service = true;
            $newService->looking = (($request->clean_looking == 'looking') ? true : false);
            $newService->current_cost = $request->clean_cost;
            if (!empty($request->clean_month) and !empty($request->clean_year)) {
                $newService->contract_exp = $request->clean_month . ' ' . $request->clean_year;
            } else {
                $newService->contract_exp = "None";
            }
            $newService->description = $request->beds . " Beds; " . $request->baths . " Baths";
            $newService->quantity = $request->sq_ft;

            $uploadName = $userId . "floorPlan.png";
            Storage::disk('local')->put($uploadName, $request->floor_plan);

            $newService->save();
        } else {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = 'Cleaning';
            $newService->has_service = false;
            $newService->looking = (($request->clean_looking == 'looking') ? true : false);
            $newService->current_cost = 0;
            $newService->contract_exp = "None";
            $newService->description = $request->beds . " Beds; " . $request->baths . " Baths";
            $newService->quantity = $request->sq_ft;

            $fileUpload = $request->file(key: "floor_plan");
            //$img = $fileUpload->getRealPath();
            \Log::info(json_encode($fileUpload));
            \Log::info(json_encode($fileUpload->getClientOriginalName()));
            $path = $fileUpload->getRealPath();
            //$extension = $request->floor_plan->extension();
            \Log::info(json_encode($path));
            $uploadName = "User" . $custId . "floorPlan.png";
            //$path = $request->floor_plan->storeAs('images', $uploadName);
            Storage::disk('local')->put($uploadName, $fileUpload);

            $newService->save();
        }

        if ($request->session()->has('show_landscape')) {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = "Lawn_Care";
            $newService->has_service = true;
            $newService->looking = (($request->land_looking == 'looking') ? true : false);
            $newService->current_cost = $request->land_cost;
            if (!empty($request->land_month) and !empty($request->land_year)) {
                $newService->contract_exp = $request->land_month . ' ' . $request->land_year;
            } else {
                $newService->contract_exp = "None";
            }
            $newService->description = "None";
            $newService->quantity = $request->land_sq_ft;

            $uploadName = $custId . "floorPlan.png";
            Storage::disk('local')->put($uploadName, $request->floor_plan);

            $newService->save();
        } else {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = 'Lawn_Care';
            $newService->has_service = false;
            $newService->looking = (($request->land_looking == 'looking') ? true : false);
            $newService->current_cost = 0;
            $newService->contract_exp = "None";
            $newService->description = "None";
            $newService->quantity = $request->land_sq_ft;

            $newService->save();
        }

        if ($request->session()->has('show_phone')) {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = "Phone_Line";
            $newService->has_service = true;
            $newService->looking = (($request->phone_looking == 'looking') ? true : false);
            $newService->current_cost = $request->phone_cost;
            if (!empty($request->phone_month) and !empty($request->phone_year)) {
                $newService->contract_exp = $request->phone_month . ' ' . $request->phone_year;
            } else {
                $newService->contract_exp = "None";
            }
            $newService->description = "None";
            $newService->quantity = $request->num_service;
            $newNonService->description = $request->devices;

            $newService->save();

            if (($request->num_phones - $request->num_service) > 0) {
                $newNonService = new current_services;
                $newNonService->cust_id = $custId;
                $newNonService->service_type = "Phone_Line";
                $newNonService->has_service = false;
                $newNonService->looking = (($request->phone_looking == 'looking') ? true : false);
                $newNonService->current_cost = 0;
                $newNonService->contract_exp = "None";
                $newNonService->description = "None";
                $newNonService->quantity = $request->num_phones - $request->num_service;
                $newNonService->description = $request->devices;
                $newNonService->save();
            }
        } else {
            $newService = new current_services;
            $newService->cust_id = $custId;
            $newService->service_type = "Phone_Line";
            $newService->has_service = false;
            $newService->looking = (($request->phone_looking == 'looking') ? true : false);
            $newService->current_cost = 0;
            $newService->contract_exp = "None";
            $newService->description = "None";
            $newService->quantity = $request->num_phones;
            $newService->description = $request->devices;

            $newService->save();
        }
    }

    private function BusAddService(Request $request, int $userId) {

        $queryBusId = DB::table('bus_accts')->where('acct_no', $userId)->first();
//        \Log::info(json_encode($queryUserId->id));
        $busId = $queryBusId->bus_id;

        if ($request->session()->has('show_mortgage')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = 'Mortgage';
            $newService->service_cost = $request->mort_cost;
            $newService->has_contract = false;

            $newService->save();
        }

        if ($request->session()->has('show_insurance')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = 'Insurance';
            $newService->service_cost = $request->ins_cost;
            $newService->has_contract = false;

            $newService->save();

            $newService->save();
        }

        if ($request->session()->has('show_25internet')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = '25GB_Internet';
            $newService->service_cost = $request->int25_cost;
            $newService->has_contract = false;

            $newService->save();
        }

        if ($request->session()->has('show_50internet')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = '50GB_Internet';
            $newService->service_cost = $request->int50_cost;
            $newService->has_contract = false;

            $newService->save();
        }

        if ($request->session()->has('show_100internet')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = '100GB_Internet';
            $newService->service_cost = $request->int100_cost;
            $newService->has_contract = false;

            $newService->save();
        }

        if ($request->session()->has('show_cleaning')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = 'Cleaning';
            $newService->service_cost = $request->clean_cost;
            $newService->has_contract = false;

            $newService->save();
        }

        if ($request->session()->has('show_landscape')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = 'Lawn_Care';
            $newService->service_cost = $request->land_cost;
            $newService->has_contract = false;

            $newService->save();
        }

        if ($request->session()->has('show_phone')) {
            $newService = new offered_services;
            $newService->bus_id = $busId;
            $newService->service_type = 'Phone_Line';
            $newService->service_cost = $request->phone_cost;
            $newService->has_contract = false;

            $newService->save();
        }
    }

    public function AddServices(Request $request) {
        \Log::info(json_encode($request->session()->get('acct_no')));
        switch ($request->input('action')) {
            case 'Add Mortgage':
                session()->put('show_mortgage', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case 'Remove Mortgage':
                session()->forget('show_mortgage');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Add Home Owners' Insurance":
                session()->put('show_insurance', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Remove Insurance":
                session()->forget('show_insurance', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Add Internet":
                session()->put('show_internet', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Remove Internet":
                session()->forget('show_internet');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Add Cleaning":
                session()->put('show_cleaning', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Remove Cleaning":
                session()->forget('show_cleaning');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Add Land":
                session()->put('show_landscape', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Remove Land":
                session()->forget('show_landscape');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Add Phones":
                session()->put('show_phone', 'true');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case "Remove Phones":
                session()->forget('show_phone');
                session()->save();
                return redirect('customerRegisterPage')->withInput();

            case 'Register': {
                    $userNo = $request->session()->get('acct_no');

                    $this->AddService($request, $userNo);

                    $request->session()->flush();
                    $request->session()->save();

                    $request->session()->put('acct_no', $userNo);
                    $request->session()->save();

                    return redirect('dashboard');
                }
        }
    }

    public function BusAddServices(Request $request) {
        switch ($request->input('action')) {
            case 'Add Mortgage':
                session()->put('show_mortgage', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case 'Remove Mortgage':
                session()->forget('show_mortgage');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add Home Owners' Insurance":
                session()->put('show_insurance', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove Insurance":
                session()->forget('show_insurance', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add 25GB Internet":
                session()->put('show_25internet', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove 25GB Internet":
                session()->forget('show_25internet');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add 50GB Internet":
                session()->put('show_50internet', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove 50GB Internet":
                session()->forget('show_50internet');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add 100GB Internet":
                session()->put('show_100internet', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove 100GB Internet":
                session()->forget('show_100internet');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add Cleaning":
                session()->put('show_cleaning', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove Cleaning":
                session()->forget('show_cleaning');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add Land":
                session()->put('show_landscape', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove Land":
                session()->forget('show_landscape');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Add Phones":
                session()->put('show_phone', 'true');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case "Remove Phones":
                session()->forget('show_phone');
                session()->save();
                return redirect('businessRegisterPage')->withInput();

            case 'Register': {
                    $userNo = $request->session()->get('acct_no');

                    $this->BusAddService($request, $userNo);

                    return redirect('busdashboard');
                }
        }
    }
}
