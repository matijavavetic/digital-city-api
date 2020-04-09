<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\RoleController;
use src\Applications\Http\Controllers\UserController;
use src\Applications\Http\Controllers\PermissionController;

Route::get('/role.list', [RoleController::class, 'list']);
Route::get('/role.info', [RoleController::class, 'info']);
Route::post('/role.create', [RoleController::class, 'create']);
Route::post('/role.update', [RoleController::class, 'update']);
Route::post('/role.delete', [RoleController::class, 'delete']);

Route::get('/user.list', [UserController::class, 'list']);
Route::get('/user.info', [UserController::class, 'info']);
Route::post('/user.create', [UserController::class, 'create']);
Route::post('/user.update', [UserController::class, 'update']);
Route::post('/user.delete', [UserController::class, 'delete']);

Route::get('/permission.list', [PermissionController::class, 'list']);
Route::get('/permission.info', [PermissionController::class, 'info']);
Route::post('/permission.create', [PermissionController::class, 'create']);
Route::post('/permission.update', [PermissionController::class, 'update']);
Route::post('/permission.delete', [PermissionController::class, 'delete']);
