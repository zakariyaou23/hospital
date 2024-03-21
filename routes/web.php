<?php

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
    return view('welcome');
});

Route::group(['middleware' => ['auth']],function () {
    Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');


    Route::group(['prefix' => '/admin', 'as' => 'admin.','middleware' => ['role:1']],function () {
        Route::resource('/role', App\Http\Controllers\Admin\RoleController::class);
        Route::resource('/infrastructure', App\Http\Controllers\Admin\InfrastructureController::class);
        Route::resource('/room', App\Http\Controllers\Admin\RoomController::class);
        Route::resource('/drug', App\Http\Controllers\Admin\DrugController::class);
        Route::resource('/department', App\Http\Controllers\Admin\DepartmentController::class);
        Route::resource('/appointment', App\Http\Controllers\Admin\AppointmentController::class);
        Route::resource('/patient', App\Http\Controllers\Admin\PatientController::class);
        Route::resource('/staff', App\Http\Controllers\Admin\StaffController::class);
        Route::resource('/leave_request', App\Http\Controllers\Admin\LeaveRequestController::class);
    });

    Route::group(['prefix' => '/infrastructure', 'as' => 'infrastructure.'],function () {
        Route::resource('/role', App\Http\Controllers\Infrastructure\RoleController::class);
        Route::resource('/room', App\Http\Controllers\Infrastructure\RoomController::class);
        Route::resource('/drug', App\Http\Controllers\Infrastructure\DrugController::class);
        Route::resource('/department', App\Http\Controllers\Infrastructure\DepartmentController::class);
        Route::resource('/appointment', App\Http\Controllers\Infrastructure\AppointmentController::class);
        Route::resource('/patient', App\Http\Controllers\Infrastructure\PatientController::class);
        Route::resource('/staff', App\Http\Controllers\Infrastructure\StaffController::class);
        Route::resource('/leave_request', App\Http\Controllers\Infrastructure\LeaveRequestController::class);
    });

    Route::group(['prefix' => '/ajax', 'as' => 'ajax.'],function () {
        Route::get('/patients', [App\Http\Controllers\Ajax\DataTableController::class, 'getPatients'])->name('patients');
    });

});
