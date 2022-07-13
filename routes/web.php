<?php

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
            Route::get('/users/status/{id}/{status}','App\Http\Controllers\UserController@statuschange');

            // Employees Route
            Route::get('employees', 'App\Http\Controllers\EmployeesController@index')->name('employees');
            Route::post('/employees/add','App\Http\Controllers\EmployeesController@store');
            Route::delete('/employees/{id}','App\Http\Controllers\EmployeesController@destroy');
});
