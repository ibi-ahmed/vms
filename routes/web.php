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

Auth::routes(['register' => false]);

// User Routes
// Route::middleware(['user-access:user'])->group(function () {
    Route::get('/user-dashboard', [App\Http\Controllers\UserController::class, 'userDashboard'])->name('user.dashboard');
// });

// Route::middleware(['user-access:user'])->group(function () {
    // Route::get('/q', function(){ 
    //     return response()->json('supp'); 
    // })->middleware(['user-access:staff', 'user-access:user']);
// });

// Staff Routes
// Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff-dashboard', [App\Http\Controllers\StaffController::class, 'staffDashboard'])->name('staff.dashboard');
// });

// Admin Routes
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin.dashboard');
// });

// Super Routes
// Route::middleware(['auth', 'user-access:super'])->group(function () {  
    Route::get('/super-dashboard', [App\Http\Controllers\SuperController::class, 'superDashboard'])->name('super.dashboard');
// });

Route::get('/add-user', [App\Http\Controllers\AdminController::class, 'addUser'])->name('user.register');
Route::post('/add-user', [App\Http\Controllers\AdminController::class, 'storeUser'])->name('user.store');

Route::get('/visitor-search', [App\Http\Controllers\VisitorController::class, 'getVisitor'])->name('visitor.search');
// Route::get('/visitor-search-phone', [App\Http\Controllers\VisitorController::class, 'getVisitorByPhone'])->name('visitor.search.phone');

Route::get('/add-visitor', [App\Http\Controllers\VisitorController::class, 'add'])->name('visitor.add');
Route::post('/add-visitor', [App\Http\Controllers\VisitorController::class, 'storeVisitor'])->name('visitor.store');

Route::get('/edit-visitor/{id}', [App\Http\Controllers\VisitorController::class, 'edit'])->name('visitor.edit');
Route::post('/edit-visitor/{id}', [App\Http\Controllers\VisitorController::class, 'editVisitor'])->name('visitor.editVisitor');

Route::get('/all-visitor/{query?}', [App\Http\Controllers\VisitorController::class, 'all'])->name('visitor.all');
// Route::get('/all-visitors', [App\Http\Controllers\VisitorController::class, 'all'])->name('visitor.all')->middleware('user-access:staff');
Route::get('/tagged-visitors/{query?}', [App\Http\Controllers\VisitorController::class, 'taggedVisitors'])->name('tagged.visitors');

Route::get('/single-visitor/{id}', [App\Http\Controllers\VisitorController::class, 'single'])->name('visitor.single');

Route::get('/recent-visits', [App\Http\Controllers\VisitorController::class, 'recent'])->name('visitor.recent');
// Route::get('/add-visit', [App\Http\Controllers\VisitorController::class, 'addVisit'])->name('visitor.add-visit');
Route::post('/add-visit', [App\Http\Controllers\VisitorController::class, 'storeVisit'])->name('visit.store');

Route::get('/tag-scan/{tag_no}', [App\Http\Controllers\TagController::class, 'scan'])->name('tags.scan');
Route::post('/tag-assign/{id}', [App\Http\Controllers\TagController::class, 'tagAssign'])->name('tag.assign');
Route::post('/tag-deactivate/{id}', [App\Http\Controllers\TagController::class, 'tagDeactivate'])->name('tag.deactivate');

Route::get('/schedule-appointment', [App\Http\Controllers\AppointmentController::class, 'schedule'])->name('appointments.schedule');
Route::post('/schedule-appointment', [App\Http\Controllers\AppointmentController::class, 'storeAppointment'])->name('appointments.store');
Route::post('/schedule-existing-visitor-appointment', [App\Http\Controllers\AppointmentController::class, 'storeExistingVisitorAppointment'])->name('existing_visitor_appointments.store');

Route::post('/cancel-appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'cancel'])->name('appointments.cancel');
Route::post('/approve-appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'approveAppointment'])->name('appointments.approve');
Route::post('/staff-approve-appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'staffApproveAppointment'])->name('appointments.staff-approve');

Route::get('/all-appointments', [App\Http\Controllers\AppointmentController::class, 'all'])->name('appointments.all');
Route::get('/my-appointments', [App\Http\Controllers\AppointmentController::class, 'myAppointments'])->name('appointments.my');
Route::get('/recent-appointments', [App\Http\Controllers\AppointmentController::class, 'recent'])->name('appointments.recent');


Route::get('/staff-search', [App\Http\Controllers\HomeController::class, 'getStaff'])->name('staff.search');



