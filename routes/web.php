<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [\App\Http\Controllers\HomeController::class,'welcome']);

Route::get('locale/{locale}/', function($locale){
    Session::put('locale',$locale);
    return redirect()->back();
});


Route::get('/test_mail',[App\Http\Controllers\HomeController::class,'testMail']);
Route::post('/appointment',[App\Http\Controllers\HomeController::class,'takeAppointment'])->name('take.appointment');

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
        Route::resource('/room', App\Http\Controllers\Infrastructure\RoomController::class);
        Route::resource('/drug', App\Http\Controllers\Infrastructure\DrugController::class);
        Route::resource('/leave', App\Http\Controllers\Infrastructure\LeaveController::class);
        Route::resource('/department', App\Http\Controllers\Infrastructure\DepartmentController::class);
        Route::resource('/appointment', App\Http\Controllers\Infrastructure\AppointmentController::class);
        Route::resource('/patient', App\Http\Controllers\Infrastructure\PatientController::class);
        Route::resource('/staff', App\Http\Controllers\Infrastructure\StaffController::class);
        Route::resource('/doctor', App\Http\Controllers\Infrastructure\DoctorController::class);
        Route::resource('/transfer', App\Http\Controllers\Infrastructure\TransferController::class);
        // Route::resource('/leave_request', App\Http\Controllers\Infrastructure\LeaveRequestController::class);
    });
});
Route::group(['prefix' => '/ajax', 'as' => 'ajax.'],function () {

    Route::get('/doctors', [App\Http\Controllers\Ajax\AjaxController::class, 'getDoctorsPerDepartment'])->name('select.doctors');

    Route::group(['prefix' => '/infrastructure', 'as' => 'infrastructure.'],function () {
        Route::get('/patients', [App\Http\Controllers\Ajax\DataTableController::class, 'getInfrastructurePatients'])->name('patients');
        Route::get('/appointments', [App\Http\Controllers\Ajax\DataTableController::class, 'getInfrastructureAppointments'])->name('appointments');
        Route::get('/transfers', [App\Http\Controllers\Ajax\DataTableController::class, 'getInfrastructureTransfers'])->name('transfers');
        Route::get('/departments', [App\Http\Controllers\Ajax\DataTableController::class, 'getInfrastructureDepartments'])->name('departments');
        Route::get('/staffs', [App\Http\Controllers\Ajax\DataTableController::class, 'getInfrastructureStaffs'])->name('staffs');
    });

    Route::group(['prefix' => '/admin', 'as' => 'admin.'],function () {
        Route::get('/staffs', [App\Http\Controllers\Ajax\DataTableController::class, 'getAdminStaffs'])->name('staffs');
    });

});
