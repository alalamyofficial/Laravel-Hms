<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);


Route::get('/home',[HomeController::class,'redirect']);




Route::group(['middleware' => 'auth'], function()
    {
        Route::post('/appointment',[HomeController::class,'appointment']);

        Route::get('/myappointments',[HomeController::class,'myappointments']);

        Route::get('cancel/appointment/{id}',[HomeController::class,'cancel_appointment']);

    }
);


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
