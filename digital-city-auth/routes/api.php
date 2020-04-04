<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\RoleController;

Route::get('/role.list', [RoleController::class, 'list']);
Route::get('/role.info', [RoleController::class, 'info']);
Route::post('/role.create', [RoleController::class, 'create']);
Route::post('/role.update', [RoleController::class, 'update']);
Route::post('/role.delete', [RoleController::class, 'delete']);
