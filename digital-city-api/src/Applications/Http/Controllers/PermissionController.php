<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\PermissionService;
use src\Applications\Http\FormRequests\Permission\PermissionCreateRequest;
use src\Applications\Http\FormRequests\Permission\PermissionListRequest;
use src\Applications\Http\FormRequests\Permission\PermissionInfoRequest;
use src\Applications\Http\FormRequests\Permission\PermissionUpdateRequest;
use src\Applications\Http\FormRequests\Permission\PermissionDeleteRequest;
use src\Applications\Http\Factories\Permission\PermissionListRequestMapperFactory;
use src\Applications\Http\Factories\Permission\PermissionInfoRequestMapperFactory;
use src\Applications\Http\Factories\Permission\PermissionCreateRequestMapperFactory;
use src\Applications\Http\Factories\Permission\PermissionUpdateRequestMapperFactory;
use src\Applications\Http\Factories\Permission\PermissionDeleteRequestMapperFactory;

class PermissionController extends Controller
{
    public function list(PermissionListRequest $request, PermissionService $permissionService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = PermissionListRequestMapperFactory::make($data);

        $responseMapper = $permissionService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function info(PermissionInfoRequest $request, PermissionService $permissionService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = PermissionInfoRequestMapperFactory::make($data);

        $responseMapper = $permissionService->getOne($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function create(PermissionCreateRequest $request, PermissionService $permissionService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = PermissionCreateRequestMapperFactory::make($data);

        $responseMapper = $permissionService->create($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function update(PermissionUpdateRequest $request, PermissionService $permissionService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = PermissionUpdateRequestMapperFactory::make($data);

        $responseMapper = $permissionService->update($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function delete(PermissionDeleteRequest $request, PermissionService $permissionService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = PermissionDeleteRequestMapperFactory::make($data);

        $responseMapper = $permissionService->delete($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}
