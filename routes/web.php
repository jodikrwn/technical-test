<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('authentication');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::post('/employee/search', [EmployeeController::class, 'search'])->name('employee.search');

Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
Route::put('/department/{department}', [DepartmentController::class, 'update'])->name('department.update');
Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('department.destroy');
Route::post('/department/search', [DepartmentController::class, 'search'])->name('department.search');

Route::get('/designation', [DesignationController::class, 'index'])->name('designation.index');
Route::post('/designation', [DesignationController::class, 'store'])->name('designation.store');
Route::put('/designation/{designation}', [DesignationController::class, 'update'])->name('designation.update');
Route::delete('/designation/{designation}', [DesignationController::class, 'destroy'])->name('designation.destroy');
Route::post('/designation/search', [DesignationController::class, 'search'])->name('designation.search');
