<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [LoginController::class, 'index']
)->name('login');

Route::post(
    '/',
    [LoginController::class, 'authentication']
)->name('authentication');

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard.index');

// Employee
Route::resource(
    'employee',
    EmployeeController::class
)->only(
    [
        'index',
        'store',
        'update',
        'destroy'
    ]
);
Route::post(
    '/employee/search',
    [EmployeeController::class, 'search']
)->name('employee.search');

// Department
Route::resource(
    'department',
    DepartmentController::class
)->only(
    [
        'index',
        'store',
        'update',
        'destroy'
    ]
);
Route::post(
    '/department/search',
    [DepartmentController::class, 'search']
)->name('department.search');


// Designation
Route::resource(
    'designation',
    DesignationController::class
)->only(
    [
        'index',
        'store',
        'update',
        'destroy'
    ]
);
Route::post(
    '/designation/search',
    [DesignationController::class, 'search']
)->name('designation.search');
