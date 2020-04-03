<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\RoleController;
use src\Applications\Http\Controllers\UserController;

Route::get('/role.list', [RoleController::class, 'list']);
Route::get('/role.info', [RoleController::class, 'info']);
Route::get('/user.list', [UserController::class, 'list']);
