<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::middleware('api')->group(function () {
    Route::apiResource('companies', CompanyController::class)->middleware('auth:sanctum');
    Route::apiResource('employees', EmployeeController::class)->middleware('auth:sanctum');
});
