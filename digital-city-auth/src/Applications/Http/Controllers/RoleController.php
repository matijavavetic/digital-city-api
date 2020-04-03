<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\RoleService;
use src\Applications\Http\FormRequests\Role\RoleListRequest;
use src\Applications\Http\FormRequests\Role\RoleInfoRequest;
use src\Applications\Http\Factories\Role\RoleListRequestMapperFactory;
use src\Applications\Http\Factories\Role\RoleInfoRequestMapperFactory;

class RoleController extends Controller
{
    public function list(RoleListRequest $request, RoleService $roleService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = RoleListRequestMapperFactory::make($data);

        $responseMapper = $roleService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function info(RoleInfoRequest $request, RoleService $roleService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = RoleInfoRequestMapperFactory::make($data);

        $responseMapper = $roleService->getOne($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}