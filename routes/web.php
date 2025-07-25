<?php

use App\Http\Controllers\AdminCalculatorController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminFilmController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSessionController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('/admin')->middleware('guest')->group(function(){
    Route::get('/login', [AdminSessionController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminSessionController::class, 'store'])->name('admin.login.store');

});
Route::prefix('/admin')->name('admin.')->middleware('role:admin,superadmin')->group(function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/films', AdminFilmController::class);
    Route::resource('/roles', AdminRoleController::class);
    Route::get('/calculator', [AdminCalculatorController::class, 'index'])->name('calculator.index');
    Route::post('/calculator', [AdminCalculatorController::class, 'store'])->name('calculator.store');
    Route::get('/calculator/show', [AdminCalculatorController::class, 'show'])->name('calculator.show');

});

// Route::get('/admin', function(){
//     User::create([
//         'name' => 'shivam',
//         'email' => 'shivam@gmail.com',
//         'password' => '00000000'
//     ]);
// });
