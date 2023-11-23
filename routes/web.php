<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('index');

Route::get('/new-appointment/{doctorId}/{date}', [App\Http\Controllers\FrontendController::class, 'show'])->name('create.appointment');

Route::post('/book/appointment', [App\Http\Controllers\FrontendController::class, 'store'])->name('booking.appointment')->middleware('auth');

Route::get('/book/my-booking', [App\Http\Controllers\FrontendController::class, 'myBookings'])->name('my.booking')->middleware('auth');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);

Route::get('/test', function () {
    return view('test');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']],function() {
    Route::get('/doctor',  [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');
    Route::get('/doctor/create',  [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');

    Route::get('/doctor/edit/{user}',  [App\Http\Controllers\DoctorController::class, 'edit'])->name('doctor.edit');
    Route::get('/doctor/show/{user}',  [App\Http\Controllers\DoctorController::class, 'show'])->name('doctor.show');

    Route::get('/doctor/update/{user}',  [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');
    Route::put('/doctor/update/{user}',  [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');

    Route::post('/doctor/store',  [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');

    Route::DELETE('/doctor/destroy/{user}',  [App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctor.destroy');
    
});

Route::group(['middleware'=>['auth','doctor']],function() {
    Route::get('/appointment',  [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/create',  [App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/appointment/store',  [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/appointment/check', [App\Http\Controllers\AppointmentController::class, 'check'])->name('appointment.check');
    Route::post('/appointment/update', [App\Http\Controllers\AppointmentController::class, 'updateTime'])->name('update');    
});

