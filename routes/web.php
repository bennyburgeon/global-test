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
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

Route::get('admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::post('admin-check-login', [LoginController::class, 'AdminCheckLogin'])->name('admin.check.login');
Route::group(['middleware'=>['admin']],function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('candidates-list', [AdminController::class, 'candidatesList'])->name('candidates.list');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('check-login', [LoginController::class, 'checkLogin'])->name('check.login');
Route::resource('candidate',CandidateController::class)->except([
    'edit','update' 
]);

Route::group(['middleware'=>['candidate']],function(){
    Route::get('candidate-logout', [LoginController::class, 'candidateLogout'])->name('candidate.logout');
    Route::get('candidate-dashboard', [AdminController::class, 'candidateDashboard'])->name('candidate.dashboard');
    Route::post('candidate-update-password', [LoginController::class, 'updatePassword'])->name('candidates.password.update');
    Route::get('candidate-change-password', [LoginController::class, 'changePassword'])->name('candidates.password.change');
    Route::resource('candidate',CandidateController::class);
});
