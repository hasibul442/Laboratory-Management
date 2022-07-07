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
// Auth::routes(['register' => false]);
Route::get('/', function () {
    return view('auth.login');
});
// Route::post('/', function () {
//     return view('auth.register');
// })->name('register');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
        ->group(function () {
            Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

            Route::get('user', 'App\Http\Controllers\UserController@index')->name('user');

            Route::get('employees', 'App\Http\Controllers\EmployeesController@index')->name('employees');
            Route::post('/employees/add','App\Http\Controllers\EmployeesController@store');
            Route::delete('/employees/{id}','App\Http\Controllers\EmployeesController@destroy');
});
