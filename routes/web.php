<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RgestrationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\BranchController;


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

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::get('login', [LoginController::class, 'index'])->name('index');

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('forget_password', [LoginController::class, 'forget'])->name('forget.password');
Route::post('get_password', [LoginController::class, 'getMailSms'])->name('forget.get_mail_sms');

Route::get('password_reset', [LoginController::class, 'resetPassword'])->name('reset.password');
Route::post('update_password', [LoginController::class, 'passwordUpdate'])->name('update.password');
//Regestration
Route::get('user-reg-view', [RgestrationController::class, 'userview'])->name('userview');
Route::post('user-reg-store', [RgestrationController::class, 'userstore'])->name('userstore');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('welcome');
    //Permission
    Route::get('permission-view', [PermissionController::class, 'permissionview'])->name('permissionview');
    Route::post('permission-view', [PermissionController::class, 'store'])->name('permissionview');
    Route::get('branch', [BranchController::class, 'index'])->name('branch.list');

    //user create


});


