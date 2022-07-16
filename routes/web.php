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
});
