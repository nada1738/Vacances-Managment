<?php

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


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanceController;
use App\Http\Controllers\EmployeeController;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;

// Authentication Routes

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/employees', EmployeeController::class);


    Route::prefix('vacances')->group(function () {
        Route::get('/', [VacanceController::class, 'index'])->name('vacances.index');
        Route::get('/create', [VacanceController::class, 'create'])->name('vacances.create');
        Route::post('/', [VacanceController::class, 'store'])->name('vacances.store');
        Route::get('/{id}', [VacanceController::class, 'show'])->name('vacances.show');
        Route::get('/{id}/edit', [VacanceController::class, 'edit'])->name('vacances.edit');
        Route::put('/{id}', [VacanceController::class, 'update'])->name('vacances.update');
        Route::delete('/{id}', [VacanceController::class, 'destroy'])->name('vacances.destroy');
        Route::get('vacances/history', [VacanceController::class, 'history'])->name('vacances.history');
    });

    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('/', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('/{id}', [DepartmentController::class, 'show'])->name('departments.show');
        Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::put('/{id}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::delete('/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});
