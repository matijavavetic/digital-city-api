<?php

use Illuminate\Support\Facades\Route;
use src\Applications\Http\Controllers\RoleController;

Route::get('/role.list', [RoleController::class, 'list']);
