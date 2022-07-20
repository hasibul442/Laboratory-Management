<?php

use App\Models\Patients;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])
        ->group(function () {
            Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
            Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

            // Users Route
            Route::get('user', 'App\Http\Controllers\UserController@index')->name('user');
            Route::get('/users/edit/{id}', "App\Http\Controllers\UserController@edit");
            Route::put('/users/update','App\Http\Controllers\UserController@update');
            Route::put('/users/pass/update','App\Http\Controllers\UserController@updatepass');
            Route::get('/users/status/{id}/{status}','App\Http\Controllers\UserController@statuschange');
            Route::delete('/user/{id}','App\Http\Controllers\UserController@destroy');

            // Employees Route
            Route::get('/employees', 'App\Http\Controllers\EmployeesController@index')->name('employees');
            Route::post('/employees/add','App\Http\Controllers\EmployeesController@store');
            Route::get('/employees/details/{id}/','App\Http\Controllers\EmployeesController@show')->name('employees.profile');
            Route::get('/employees/edit/{id}/','App\Http\Controllers\EmployeesController@edit')->name('employees.edit');
            Route::put('/employees/edit/{id}/','App\Http\Controllers\EmployeesController@update')->name('employees.update');
            Route::delete('/employees/{id}','App\Http\Controllers\EmployeesController@destroy');

            // Patients ROutes
            Route::get('/patients', 'App\Http\Controllers\PatientsController@index')->name('patients.list');
            Route::get('/new/patients', 'App\Http\Controllers\PatientsController@create')->name('patients.create');
            Route::post('/new/patients/store', 'App\Http\Controllers\PatientsController@store')->name('patients.store');
            Route::get('/patients/status/{id}/{status}','App\Http\Controllers\PatientsController@statuschange');
            Route::get('/patients/details/{id}/','App\Http\Controllers\PatientsController@show')->name('patients.profile');
            Route::delete('/patients/{id}','App\Http\Controllers\PatientsController@destroy');

            // Referrals Route
            Route::get('/referrals', 'App\Http\Controllers\ReferralController@index')->name('referrels.list');
            Route::post('/referrals/add','App\Http\Controllers\ReferralController@store');
            Route::get('/referrals/edit/{id}', "App\Http\Controllers\ReferralController@edit");
            Route::put('/referrals/update', "App\Http\Controllers\ReferralController@update");
            Route::delete('/referrals/{id}','App\Http\Controllers\ReferralController@destroy');

            // labtest Category Route
            Route::get('labtest', 'App\Http\Controllers\LabTestCatController@index')->name('labtest');
            Route::post('/labtest/add','App\Http\Controllers\LabTestCatController@store');
            Route::delete('/labtest/{id}','App\Http\Controllers\LabTestCatController@destroy');
            Route::get('/labtest/edit/{id}/','App\Http\Controllers\LabTestCatController@edit')->name('labtest.edit');
            Route::put('/labtest/update','App\Http\Controllers\LabTestCatController@update')->name('labtest.update');

            // Billing System Route
            Route::get('/billing', 'App\Http\Controllers\BillsController@index')->name('billing');
            Route::get('/allbilling', 'App\Http\Controllers\BillsController@allbills')->name('allbills');
            Route::post('/billing/add','App\Http\Controllers\BillsController@store');
            Route::get('/billing/details/{id}/','App\Http\Controllers\BillsController@show')->name('billing.details');

            // Billing System Route
            Route::get('/transection/record', 'App\Http\Controllers\PaymentsController@index')->name('transection.record');
            Route::get('/transection/other', 'App\Http\Controllers\PaymentsController@create')->name('other.transection');
            Route::post('/transection/other/post', 'App\Http\Controllers\PaymentsController@store')->name('other.transection.store');

            //Report Genarate Route
            Route::get('/patientreport', 'App\Http\Controllers\ReportGenarationController@patientindex')->name('patientreport');
            Route::get('/ledger', 'App\Http\Controllers\ReportGenarationController@ledger')->name('ledger');
            Route::get('/ledger/details', 'App\Http\Controllers\ReportGenarationController@ledgerdetails')->name('ledger.details');
});
