<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;


//home
Route::get('/',[HomeController::class,'index']);


//doctors
Route::get('all/doctors',[DoctorController::class,'show']);




Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home',[HomeController::class,'redirect'])->middleware('verified');

    Route::post('/appointment',[HomeController::class,'appointment']);

    Route::get('/myappointments',[HomeController::class,'myappointments']);

    Route::get('cancel/appointment/{id}',[HomeController::class,'cancel_appointment']);

});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Admin

//Doctor
Route::get('/add/doctor',[AdminController::class,'add']);
Route::post('/store/doctor',[AdminController::class,'store']);
Route::get('/doctors',[AdminController::class,'show_doctors']);
Route::get('edit/doctor/{id}',[AdminController::class,'edit_doctor']);
Route::post('/update/doctor/{id}',[AdminController::class,'update']);
Route::get('delete/doctor/{id}',[AdminController::class,'delete_doctor']);



//Appointments
Route::get('/appointments',[AdminController::class,'appointments']);
Route::get('approve/appointment/{id}',[AdminController::class,'approve_appointment']);
Route::get('cancel/appointment/{id}',[AdminController::class,'cancel_appointment']);


//Mail
Route::get('/email/{id}',[AdminController::class,'email_view']);
Route::post('send/email/{id}',[AdminController::class,'send_email']);


