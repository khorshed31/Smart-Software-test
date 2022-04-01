<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
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

Route::get('/', [ViewController::class, 'index'])->name('home');

Route::get('/add-doctor', [DoctorController::class, 'index'])->name('doctor.add');
Route::post('/new-doctor', [DoctorController::class, 'create'])->name('doctor.new');
Route::get('/manage-doctor', [DoctorController::class, 'manage'])->name('doctor.manage');
Route::get('/edit-doctor/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
Route::post('/update-doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
Route::get('/delete-doctor/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');

Route::get('/add-appointment', [AppointmentController::class, 'index'])->name('appointment.add');
Route::post('/new-appointment', [AppointmentController::class, 'create'])->name('appointment.new');
Route::get('/get-doctor', [AppointmentController::class, 'getDoctor'])->name('doctor.get');
Route::get('/find-fee', [AppointmentController::class, 'fee'])->name('fee');
Route::get('/manage-appointment', [AppointmentController::class, 'manage'])->name('appointment.manage');
Route::get('/delete-appointment/{id}', [AppointmentController::class, 'delete'])->name('appointment.delete');
Route::post('/add-patient/{id}', [AppointmentController::class, 'addPatient'])->name('patient.add');

