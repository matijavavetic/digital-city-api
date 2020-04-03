<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\RoleService;
use src\Applications\Http\FormRequests\Role\RoleCreateRequest;
use src\Applications\Http\FormRequests\Role\RoleListRequest;
use src\Applications\Http\FormRequests\Role\RoleInfoRequest;
use src\Applications\Http\FormRequests\Role\RoleUpdateRequest;
use src\Applications\Http\Factories\Role\RoleListRequestMapperFactory;
use src\Applications\Http\Factories\Role\RoleInfoRequestMapperFactory;
use src\Applications\Http\Factories\Role\RoleCreateRequestMapperFactory;
use src\Applications\Http\Factories\Role\RoleUpdateRequestMapperFactory;

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

    public function create(RoleCreateRequest $request, RoleService $roleService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = RoleCreateRequestMapperFactory::make($data);

        $responseMapper = $roleService->create($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function update(RoleUpdateRequest $request, RoleService $roleService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = RoleUpdateRequestMapperFactory::make($data);

        $responseMapper = $roleService->update($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }
}