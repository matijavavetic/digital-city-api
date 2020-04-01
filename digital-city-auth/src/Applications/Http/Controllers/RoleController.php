<?php

namespace src\Applications\Http\Controllers;

use src\Business\Services\RoleService;

class RoleController extends Controller
{
    public function list(RoleService $roleService)
    {
        return $roleService->getAll();
    }
}