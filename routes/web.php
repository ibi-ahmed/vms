<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add-visitor', [App\Http\Controllers\VisitorController::class, 'add'])->name('visitor.add');
Route::get('/edit-visitor', [App\Http\Controllers\VisitorController::class, 'edit'])->name('visitor.edit');
Route::get('/all-visitor', [App\Http\Controllers\VisitorController::class, 'all'])->name('visitor.all');
Route::get('/single-visitor', [App\Http\Controllers\VisitorController::class, 'single'])->name('visitor.single');
Route::get('/add-visit', [App\Http\Controllers\VisitorController::class, 'addVisit'])->name('visitor.add-visit');

Route::get('/tag-scan', [App\Http\Controllers\TagController::class, 'scan'])->name('tags.scan');

Route::get('/schedule-appointment', [\App\Http\Controllers\AppointmentController::class, 'schedule'])->name('appointments.schedule');
Route::get('/all-appointments', [\App\Http\Controllers\AppointmentController::class, 'all'])->name('appointments.all');

Route::get('/admin-dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin-dashboard');


Route::get('/blank', function () {
    return view('blank');
});

