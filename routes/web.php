<?php

use App\Http\Controllers\AdminBankController;
use App\Http\Controllers\AdminCalculatorController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminFilmController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminSessionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Models\Film;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// home and films routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/films', function () {
    $films = Film::select('id', 'name')->get();

    // Prepend "All Films" option with id = 0 (or null)
    $films = collect([['id' => 0, 'name' => 'All']])
        ->merge($films);

    return Inertia::render('Frontend/Films/Index', [
        'films' => $films,
    ]);
});
Route::get('/films/show', function () {
    // $films = Film::select('id','name')->get();
    return Inertia::render('Frontend/Films/Show', [
        // 'films' =>  $films
    ]);
});

Route::prefix('/admin')->middleware('guest')->group(function () {
    Route::get('/login', [AdminSessionController::class, 'index'])->name('admin.login');
    Route::post('/login', [AdminSessionController::class, 'store'])->name('admin.login.store');
});

Route::delete('/logout', [AdminSessionController::class, 'logout'])->name('admin.logout');

Route::prefix('/admin')->name('admin.')->middleware('role:admin,superadmin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/films', AdminFilmController::class);
    Route::resource('/roles', AdminRoleController::class);
    Route::resource('/users', AdminUserController::class);
    Route::get('/calculator', [AdminCalculatorController::class, 'index'])->name('calculator.index');
    Route::post('/calculator', [AdminCalculatorController::class, 'store'])->name('calculator.store');
    Route::delete('/calculator/remove-item', [AdminCalculatorController::class, 'removeItem'])->name('calculator.destory');
    Route::delete('/calculator/delete', [AdminCalculatorController::class, 'destroy'])->name('calculator.forget');


    Route::get('/calculator/show', [AdminCalculatorController::class, 'show'])->name('calculator.show');

    //Generate the invoice
    Route::get('/invoice/{name}', [InvoiceController::class, 'show'])->name('invoice.show');
    Route::post('/invoice-generate', [InvoiceController::class, 'generate']);
    Route::post('/update/bank-details', [AdminBankController::class, 'update']);
});

    // Route::get('/invoice-generate', [InvoiceController::class, 'test']);

// Route::get('/admin', function(){
//     User::create([
//         'name' => 'shivam',
//         'email' => 'shivam@gmail.com',
//         'password' => '00000000'
//     ]);
// });
