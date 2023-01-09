<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EmployController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth','verified'])->group(function () {
Route::get('/dashboard', [HomeController::class,'home'])->name('dashboard');
Route::resource('car', CarController::class)->except('show');
Route::resource('driver', DriverController::class);
Route::resource('customer', CustomerController::class);
Route::resource('bank', BankController::class)->except('show');
Route::resource('contract', ContractController::class);
Route::resource('employ', EmployController::class);
Route::post('/employ/pass',[EmployController::class,'passwordChange'])->name('change_password');
Route::get('/findCarDetails',[ContractController::class,'findCarDetails']);
Route::get('/print/{id}',[ContractController::class,'print'])->name('print');
    route::post('contract/report/search',[\App\Http\Controllers\ReportController::class,'ContractSearch'])->name('contract.search');

});


require __DIR__.'/auth.php';
