<?php

// use App\Models\Visit;
// use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MicrosoftGraph;
use Laravel\Socialite\Facades\Socialite;

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
        return redirect()->route(strtolower(Auth::user()->role->name) . '.dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::get('/test', function () {
    // return response()->json('test');
    // return view('blank');

    // $staff = App\Models\User::where('id', 6)->first();
    // $appointment = App\Models\Appointment::where('id', 2)->first();
    // return new App\Mail\AppointmentCreated($staff, $appointment);
    return 'test';
});

Auth::routes(['register' => false]);

Route::get('/auth/redirect', function () {
    return Socialite::driver('azure')->redirect();
});

Route::get('/auth/callback', [App\Http\Controllers\Auth\LoginController::class, 'staffLogin']);

// User Routes
// Route::middleware(['user-access:user'])->group(function () {
Route::get('/security-dashboard', [App\Http\Controllers\UserController::class, 'securityDashboard'])->name('security.dashboard');
Route::get('/contractor-dashboard', [App\Http\Controllers\UserController::class, 'contractorDashboard'])->name('contractor.dashboard');
Route::get('/user-profile', [App\Http\Controllers\UserController::class, 'userProfile'])->name('user.profile');
Route::post('/user-profile/{user}', [App\Http\Controllers\UserController::class, 'updateUserProfile'])->name('update.user.profile');
Route::get('/all-users', [App\Http\Controllers\UserController::class, 'allUsers'])->name('users.all');
Route::get('/searchUsers/{query?}', [App\Http\Controllers\UserController::class, 'searchUsers'])->name('search.users');
Route::get('/single-user/{id}', [App\Http\Controllers\UserController::class, 'singleUser'])->name('user.single');
Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/edit-user/{user}', [App\Http\Controllers\UserController::class, 'editUser'])->name('user.editUser');
// });

// Staff Routes
// Route::middleware(['auth', 'user-access:staff'])->group(function () {
Route::get('/staff-dashboard', [App\Http\Controllers\UserController::class, 'staffDashboard'])->name('staff.dashboard');
Route::get('/edit-staff-search', [App\Http\Controllers\UserController::class, 'editStaffSearch'])->name('staff.edit.search');
Route::post('/edit-staff-view', [App\Http\Controllers\UserController::class, 'editStaffView'])->name('staff.edit.view');
Route::post('/edit-staff-role', [App\Http\Controllers\UserController::class, 'editStaffRole'])->name('staff.edit.role');
// });

// Admin Routes
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
Route::get('/admin-dashboard', [App\Http\Controllers\UserController::class, 'adminDashboard'])->name('admin.dashboard');
// });

// Super Routes
// Route::middleware(['auth', 'user-access:super'])->group(function () {  
Route::get('/super-dashboard', [App\Http\Controllers\UserController::class, 'superDashboard'])->name('super.dashboard');
// });

Route::get('/add-user', [App\Http\Controllers\UserController::class, 'addUser'])->name('user.register');
Route::post('/add-user', [App\Http\Controllers\UserController::class, 'storeUser'])->name('user.store');

Route::get('/visitor-search', [App\Http\Controllers\VisitorController::class, 'getVisitor'])->name('visitor.search');
// Route::get('/visitor-search-phone', [App\Http\Controllers\VisitorController::class, 'getVisitorByPhone'])->name('visitor.search.phone');

Route::get('/add-visitor', [App\Http\Controllers\VisitorController::class, 'add'])->name('visitor.add');
Route::post('/add-visitor', [App\Http\Controllers\VisitorController::class, 'storeVisitor'])->name('visitor.store');

Route::get('/edit-visitor/{id}', [App\Http\Controllers\VisitorController::class, 'edit'])->name('visitor.edit');
Route::post('/edit-visitor/{id}', [App\Http\Controllers\VisitorController::class, 'editVisitor'])->name('visitor.editVisitor');

Route::get('/all-visitor/{query?}', [App\Http\Controllers\VisitorController::class, 'all'])->name('visitor.all');
// Route::get('/all-visitors', [App\Http\Controllers\VisitorController::class, 'all'])->name('visitor.all')->middleware('user-access:staff');
Route::get('/tagged-visitors', [App\Http\Controllers\VisitorController::class, 'taggedVisitors'])->name('tagged.visitors');

Route::get('/single-visitor/{id}', [App\Http\Controllers\VisitorController::class, 'single'])->name('visitor.single');
Route::get('/my-visitors', [App\Http\Controllers\VisitorController::class, 'my'])->name('visitor.my');

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

Route::get('/all-appointments/{query?}', [App\Http\Controllers\AppointmentController::class, 'all'])->name('appointments.all');
Route::get('/my-appointments', [App\Http\Controllers\AppointmentController::class, 'myAppointments'])->name('appointments.my');
Route::get('/recent-appointments', [App\Http\Controllers\AppointmentController::class, 'recent'])->name('appointments.recent');

Route::post('/reports-single/{id}', [App\Http\Controllers\VisitorController::class, 'singleReport'])->name('reports.single');
Route::get('/reports-search', [App\Http\Controllers\VisitorController::class, 'reportSearch'])->name('reports.search');
Route::post('/reports-search-result', [App\Http\Controllers\VisitorController::class, 'reportSearchResult'])->name('reports.search.result');

Route::get('/add-tag-view', [App\Http\Controllers\TagController::class, 'addTagView'])->name('tags.add.view');
Route::post('/add-tag', [App\Http\Controllers\TagController::class, 'addTag'])->name('tags.add');


// Route::get('/staff-search', [App\Http\Controllers\MicrosoftGraph::class, 'users'])->name('staff.search');
Route::get('/staff-search', function (Request $request) {
    // access request data using $request variable
    $keyword = $request->input('keyword');
    // return response()->json('test');
    return MicrosoftGraph::users($keyword);
});
