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
    if (Auth::check()) {
        return redirect()->route(Auth::user()->type.'.dashboard');
    }else {
        return redirect()->route('login');
    }
});

Route::get('/z', function () {
    // return view('blank');
    return redirect()->route('admin.dashboard')->with('success', 'Test');
});

Auth::routes(['register' => false]);

// User Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user-dashboard', [App\Http\Controllers\HomeController::class, 'userDashboard'])->name('user.dashboard');
});

// Staff Routes
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff-dashboard', [App\Http\Controllers\HomeController::class, 'staffDashboard'])->name('staff.dashboard');
});

// Admin Routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin-dashboard', [App\Http\Controllers\HomeController::class, 'adminDashboard'])->name('admin.dashboard');
});

// Super Routes
Route::middleware(['auth', 'user-access:super'])->group(function () {  
    Route::get('/super-dashboard', [App\Http\Controllers\HomeController::class, 'superDashboard'])->name('super.dashboard');
});

Route::get('/add-user', [App\Http\Controllers\HomeController::class, 'addUser'])->name('user.register');
Route::post('/add-user', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('user.store');

Route::get('/add-visitor', [App\Http\Controllers\VisitorController::class, 'add'])->name('visitor.add');
Route::get('/edit-visitor', [App\Http\Controllers\VisitorController::class, 'edit'])->name('visitor.edit');
Route::get('/all-visitor', [App\Http\Controllers\VisitorController::class, 'all'])->name('visitor.all');
Route::get('/single-visitor', [App\Http\Controllers\VisitorController::class, 'single'])->name('visitor.single');
Route::get('/add-visit', [App\Http\Controllers\VisitorController::class, 'addVisit'])->name('visitor.add-visit');

Route::get('/tag-scan', [App\Http\Controllers\TagController::class, 'scan'])->name('tags.scan');

Route::get('/schedule-appointment', [App\Http\Controllers\AppointmentController::class, 'schedule'])->name('appointments.schedule');
Route::get('/all-appointments', [App\Http\Controllers\AppointmentController::class, 'all'])->name('appointments.all');
Route::get('/my-appointments', [App\Http\Controllers\AppointmentController::class, 'myAppointments'])->name('appointments.my');


Route::get('/staff-search', [App\Http\Controllers\StaffController::class, 'getStaff'])->name('staff.search');



