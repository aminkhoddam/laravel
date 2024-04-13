<?php

use App\Http\Controllers\AdminRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin-dashboard',function(){
    return view('admin.adminDashboard');
})->name('admin-dashboard');
Route::get('admin-login-view', [AdminController::class, 'create'])->name('admin-login-view');
Route::post('admin-login-store', [AdminController::class, 'store'])->name('admin-login-store');
Route::post('admin-log-out', [AdminController::class, 'destroy'])->name('admin-log-out');
Route::get('admin-register-view', [AdminRegisterController::class, 'create'])->name('admin-register-view');
Route::post('admin-register-store', [AdminRegisterController::class, 'store'])->name('admin-register-store');



