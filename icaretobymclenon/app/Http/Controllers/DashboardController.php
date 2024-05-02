<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\bus_notification;

class DashboardController extends Controller {

    //
    public function Dashboard() {
        $acctNo = session()->get('acct_no');
        $queryCount = DB::table('cust_accts')->where('acct_no', $acctNo)->count();

        if ($queryCount >= 1) {
            $queryCust = DB::table('cust_accts')->where('acct_no', $acctNo)->first();
            $custId = $queryCust->cust_id;

            $prefCount = DB::table('cust_prefs')->where('cust_id', $custId)->count();
            //$prefs = DB::table('cust_prefs')->where('cust_id', $custId)->get();

            if ($prefCount >= 1) {
                $matchCount = DB::table('cust_prefs')->where('cust_id', $custId)->join('offered_services', 'cust_prefs.service_type', '=', 'offered_services.service_type')
                        ->join('businesses', 'offered_services.bus_id', '=', 'businesses.id')
                        ->where('offered_services.service_cost', '<', 'cust_prefs.des_price')
                        ->orWhere(function ($query) {
                            $query->where('offered_services.service_cost', '<', DB::raw('cust_prefs.des_price + cust_prefs.des_price * 0.1'))->where('offered_services.has_contract', '=', 0);
                        })
                        ->count();

                $matches = DB::table('cust_prefs')->where('cust_id', $custId)->join('offered_services', 'cust_prefs.service_type', '=', 'offered_services.service_type')
                        ->join('businesses', 'offered_services.bus_id', '=', 'businesses.id')
                        ->where('offered_services.service_cost', '<', 'cust_prefs.des_price')
                        ->orWhere(function ($query) {
                            $query->where('offered_services.service_cost', '<', DB::raw('cust_prefs.des_price + cust_prefs.des_price * 0.1'))->where('offered_services.has_contract', '=', 0);
                        })
                        ->get();


                if ($matchCount >= 1) {
                    $currentMatches = array($matches[0]);
                    $found = false;
                    $i = 0;
                    $j = 0;
                    foreach ($matches as $match) {
                        foreach ($currentMatches as $currentMatch) {
                            if ($currentMatch->service_type == $match->service_type) {
                                $found = true;
                                if ($match->service_cost < $currentMatch->service_cost) {
                                    $currentMatches[$j] = $matches[$i];
                                }
                                break;
                            }
                            ++$j;
                        }
                        if (!$found) {
                            array_push($currentMatches, $matches[$i]);
                            //$currentMatches = array_merge($currentMatches, $match);
                            $found = false;
                            continue;
                        }
                        ++$i;
                        $found = false;
                    }

                    $matches = $currentMatches;

                    $i = 1;
                    foreach ($matches as $match) {

                        $notifCount = DB::table('bus_notifications')->where('bus_id', $match->bus_id)->where('service_type', $match->service_type)->where('has_contract', $match->has_contract)->count();
                        if ($notifCount >= 1) {
                            session()->put('button_' . $i, 'disable');
                        } else {
                            session()->forget('button_' . $i, 'disable');
                        }
                        $i += 1;
                    }

                    if ($matchCount >= 1) {
                        session()->put('matches', 'found');
                        return View::Make('cust_dashboard')->with(array('matches' => $matches));
                    }
                }
            }
            return view('cust_dashboard');
        } else {
            $queryBus = DB::table('bus_accts')->where('acct_no', $acctNo)->first();
            $busId = $queryBus->bus_id;

            $matchCount = DB::table('bus_notifications')->where('bus_id', $busId)->count();

            $custs = DB::table('current_services')->where('has_service', 1)->select('service_type', 'looking', 'current_cost', 'contract_exp')->get();

            if ($matchCount >= 1) {
                $matchesCount = DB::table('bus_notifications')->where('bus_id', $busId)
                        ->join('cust_prefs', function ($join) {
                            $join->on('cust_prefs.cust_id', '=', 'bus_notifications.cust_id');
                            $join->on('cust_prefs.service_type', '=', 'bus_notifications.service_type');
                        })
                        ->join('customers', 'bus_notifications.cust_id', '=', 'customers.id')
                        ->join('current_services', function ($join) {
                            $join->on('bus_notifications.service_type', '=', 'current_services.service_type');
                            $join->on('bus_notifications.cust_id', '=', 'current_services.cust_id');
                        })
                        ->select('cust_prefs.cust_id', 'first_name', 'last_name', 'email', 'phone_no', 'bus_notifications.service_type', 'current_services.current_cost', 'contract_exp')
                        ->count();
                        
                        $matches = DB::table('bus_notifications')->where('bus_id', $busId)
                        ->join('cust_prefs', function ($join) {
                            $join->on('cust_prefs.cust_id', '=', 'bus_notifications.cust_id');
                            $join->on('cust_prefs.service_type', '=', 'bus_notifications.service_type');
                        })
                        ->join('customers', 'bus_notifications.cust_id', '=', 'customers.id')
                        ->join('current_services', function ($join) {
                            $join->on('bus_notifications.service_type', '=', 'current_services.service_type');
                            $join->on('bus_notifications.cust_id', '=', 'current_services.cust_id');
                        })
                        ->select('cust_prefs.cust_id', 'first_name', 'last_name', 'email', 'phone_no', 'bus_notifications.service_type', 'current_services.current_cost', 'contract_exp')
                        ->get();
                if ($matchesCount >= 1)
                {
                    session()->put('matches', 'found');
                }
                \Log::info(json_encode($matches));
                $tables = array('custs' => $custs, 'matches' => $matches);
                return View::Make('bus_dashboard')->with($tables);
            }
        }
        return view('bus_dashboard')->with(array('custs' => $custs));
    }

    public function BusDashboard() {
        return view('bus_dashboard');
    }

    public function DashboardReturn(Request $request) {
        session()->forget('success');
        return redirect()->intended('dashboard');
    }

    public function Interest($busName, $serviceType, $hasContract, $loopIteration) {
        $queryRes = DB::table('cust_accts')->where('acct_no', session()->get('acct_no'))->first();
        $custId = $queryRes->cust_id;

        $busQuery = DB::table('businesses')->where('name', $busName)->first();
        $busId = $busQuery->id;

        $newInterest = new bus_notification;
        $newInterest->bus_id = $busId;
        $newInterest->cust_id = $custId;
        $newInterest->service_type = $serviceType;
        $newInterest->has_contract = $hasContract;
        $newInterest->save();

        static $interestValue = 0;

        $interestValue += 1;

        $prefCount = DB::table('cust_prefs')->where('cust_id', $custId)->count();
        //$prefs = DB::table('cust_prefs')->where('cust_id', $custId)->get();

        if ($prefCount >= 1) {
            $matchCount = DB::table('cust_prefs')->where('cust_id', $custId)->join('offered_services', 'cust_prefs.service_type', '=', 'offered_services.service_type')
                    ->join('businesses', 'offered_services.bus_id', '=', 'businesses.id')
                    ->where('offered_services.service_cost', '<', 'cust_prefs.des_price')
                    ->orWhere(function ($query) {
                        $query->where('offered_services.service_cost', '<', DB::raw('cust_prefs.des_price + cust_prefs.des_price * 0.1'))->where('offered_services.has_contract', '=', 0);
                    })
                    ->count();

            $matches = DB::table('cust_prefs')->where('cust_id', $custId)->join('offered_services', 'cust_prefs.service_type', '=', 'offered_services.service_type')
                    ->join('businesses', 'offered_services.bus_id', '=', 'businesses.id')
                    ->where('offered_services.service_cost', '<', 'cust_prefs.des_price')
                    ->orWhere(function ($query) {
                        $query->where('offered_services.service_cost', '<', DB::raw('cust_prefs.des_price + cust_prefs.des_price * 0.1'))->where('offered_services.has_contract', '=', 0);
                    })
                    ->get();

            if ($matchCount >= 1) {
                session()->put('matches', 'found');
                session()->put('button_' . $loopIteration, 'disable');
//                session()->put('service' . $interestValue, $serviceType);
//                session()->put('contract' . $interestValue, $hasContract);
//                session()->put('bus_name' . $interestValue, $busName);
                session()->save();
                $tables = array('matches' => $matches);
                return redirect('/dashboard')->with(array('matches' => $matches));
            }
        }
    }

    public function RemoveInterest($id, $service, $contract) {
        $queryRes = DB::table('bus_accts')->where('acct_no', session()->get('acct_no'))->first();
        $busId = $queryRes->bus_id;

        $contractBool = (($contract == "None" || $contract == null) ? 0 : 1);
        \Log::info(json_encode($busId));
        \Log::info(json_encode($id));
        \Log::info(json_encode($service));
        \Log::info(json_encode($contractBool));
        DB::table('bus_notifications')->where('bus_id', $busId)->where('cust_id', $id)->where('service_type', $service)->where('has_contract', $contractBool)->delete();

        $newCount = DB::table('bus_notifications')->where('bus_id', $busId)->count();

        $custs = DB::table('current_services')->where('has_service', 1)->select('service_type', 'looking', 'current_cost', 'contract_exp')->get();

        if ($newCount >= 1) {
            $matches = DB::table('bus_notifications')->where('bus_id', $busId)
                    ->join('cust_prefs', function ($join) {
                        $join->on('cust_prefs.cust_id', '=', 'bus_notifications.cust_id');
                        $join->on('cust_prefs.service_type', '=', 'bus_notifications.service_type');
                    })
                    ->join('customers', 'bus_notifications.cust_id', '=', 'customers.id')
                    ->join('current_services', function ($join) {
                        $join->on('bus_notifications.service_type', '=', 'current_services.service_type');
                        $join->on('bus_notifications.cust_id', '=', 'current_services.cust_id');
                    })
                    ->select('cust_prefs.cust_id', 'first_name', 'last_name', 'email', 'phone_no', 'bus_notifications.service_type', 'current_services.current_cost', 'contract_exp')
                    ->get();

            $tables = array('custs' => $custs, 'matches' => $matches);
            return View::Make('bus_dashboard')->with($tables);
        }

        \Log::info(json_encode($newCount));
        session()->forget('matches');
        session()->save();
        return view('bus_dashboard')->with(array('custs' => $custs));
    }
}
