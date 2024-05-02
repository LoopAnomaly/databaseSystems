<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\BusRegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddServicesController;
use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\InformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('Welcome');

Route::post('/login', [LoginController::class, 'Login'])->name('Login');

Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->name('Dashboard');
Route::post('/dashboard', [DashboardController::class, 'DashboardReturn'])->name('DashboardReturn');

Route::get('/dashboard/{busName}/{serviceType}/{hasContract}/{loopIteration}', [DashboardController::class, 'Interest'])->name('Interest');
Route::get('/dashboard/remove/interest/{cust}/{service}/{contract}', [DashboardController::class, 'RemoveInterest'])->name('RemoveInterest');

Route::get('/busdashboard', [DashboardController::class, 'Dashboard'])->name('BusDashboard');

Route::get('/customerRegisterPage', [CustomerRegisterController::class, 'CustRegPage'])->name('CustRegisterPage');
Route::post('/customerRegistered', [CustomerRegisterController::class, 'CustRegister'])->name('CustRegister');

Route::get('/businessRegisterPage', [BusRegisterController::class, 'BusRegPage'])->name('BusRegisterPage');
Route::post('/businessRegistered', [BusRegisterController::class, 'BusRegister'])->name('BusRegister');

Route::post('/addServices', [AddServicesController::class, 'AddServices'])->name('AddServices');
Route::post('/addServicesB', [AddServicesController::class, 'BusAddServices'])->name('BusAddServices');

Route::get('/updatePreferences', [PreferencesController::class, 'Preferences'])->name('Preferences');
Route::post('/updatedPreferences', [PreferencesController::class, 'UpdatePreferences'])->name('UpdatePreferences');

Route::get('/updateInfoPage', [InformationController::class, 'UpdateInfoPage'])->name('UpdateInfoPage');
Route::post('/updateInfo', [InformationController::class, 'UpdateInfo'])->name('UpdateInfo');



Route::post('/authenticate', [LoginController::class, 'Authenticate'])->name('Authenticate');

Route::post('/logout', [LogoutController::class, 'Logout'])->name('Logout');