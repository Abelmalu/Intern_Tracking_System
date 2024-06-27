<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('staff/destroy/{staff}', [UserController::class, 'destroy'])->name('staff.delete');
    Route::resource('school', SchoolController::class);
    Route::resource('staff',UserController::class);

} );
