<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->group(function () {
        Route::get(
            '/',
            [LoginController::class, 'index']
        )->name('login');

        Route::post(
            '/',
            [LoginController::class, 'authentication']
        )->name('authentication');
    });

Route::middleware('auth')
    ->group(function () {
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

        Route::get(
            '/employee/export-template',
            [EmployeeController::class, 'exportTemplate']
        )->name('employee.export-template');

        Route::post(
            '/employee/import',
            [EmployeeController::class, 'import']
        )->name('employee.import');


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

        Route::get(
            '/department/export-template',
            [DepartmentController::class, 'exportTemplate']
        )->name('department.export-template');

        Route::post(
            '/department/import',
            [DepartmentController::class, 'import']
        )->name('department.import');


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

        Route::get(
            '/designation/export-template',
            [DesignationController::class, 'exportTemplate']
        )->name('designation.export-template');

        Route::post(
            '/designation/import',
            [DesignationController::class, 'import']
        )->name('designation.import');

        Route::get(
            '/logout',
            [LogoutController::class, 'index']
        )->name('logout');
    });
