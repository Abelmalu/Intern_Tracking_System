<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserApplicationController;
use App\Http\Controllers\InternshipPrerequisitesController;
use App\Http\Controllers\UserInformationController;
use App\Models\Internship;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();






Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.home');


    Route::resource('school', SchoolController::class);
    Route::get('school/destroy/{school}', [SchoolController::class, 'destroy'])->name('school.delete');

    Route::resource('staff', UserController::class);
    Route::get('staff/destroy/{staff}', [UserController::class, 'destroy'])->name('staff.delete');


    Route::resource('program', ProgramController::class);
    Route::get('program/destroy/{program}', [ProgramController::class, 'destroy'])->name('program.delete');
});

Route::middleware(['auth', 'role:department'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'departmentIndex'])->name('department.home');
    Route::resource('internship', InternshipController::class);
    Route::get('internship/destroy/{internship}', [InternshipController::class, 'destroy'])->name('internship.delete');
    Route::get('internship/show/{internship}', [InternshipController::class, 'show'])->name('internship.showw');
    Route::post('/update/{internship}', [InternshipPrerequisitesController::class, 'update'])->name('internship_pre.update');
    Route::get('/internStart/{internship}', [InternshipController::class, 'start'])->name('internship.start');

    // Route::resource('/application',[UserApplicationController::class]);
});



Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('department', DepartmentController::class);
    Route::get('department/destroy/{department}', [DepartmentController::class, 'destroy'])->name('department.delete');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/userHome', [HomeController::class, 'userIndex'])->name('user.home');
    Route::get('/internship/{internship}', [InternshipController::class, 'show']);
    Route::get('/apply/{internship}', [UserApplicationController::class, 'create'])->name('user.internship.apply');
    Route::prefix('/userProfile')->group(function (){

        Route::get('/',[UserController::class,'profile'])->name('userProfile.detail');
        Route::post('/setting',[UserInformationController::class,'store'])->name('user.profile.setting');
        Route::put('/setting/{information}',[UserInformationController::class,'update'])->name('user.setting.update');
        Route::post('/upload',[UserInformationController::class,'upload'])->name('user.upload');
        Route::post('/password/{user}', [UserController::class, 'passwordChange'])->name('user.profile.password');



    });
});
