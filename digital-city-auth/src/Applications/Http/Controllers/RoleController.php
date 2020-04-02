<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\RoleService;
use src\Applications\Http\FormRequests\Role\RoleListRequest;
use src\Applications\Http\Factories\Role\RoleListRequestMapperFactory;

class RoleController extends Controller
{
    public function list(RoleListRequest $request, RoleService $roleService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = RoleListRequestMapperFactory::make($data);

        $responseMapper = $roleService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}