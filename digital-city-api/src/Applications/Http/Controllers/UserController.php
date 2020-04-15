<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use src\Data\Entities\User;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\UserService;
use src\Applications\Http\FormRequests\User\UserListRequest;
use src\Applications\Http\FormRequests\User\UserInfoRequest;
use src\Applications\Http\FormRequests\User\UserCreateRequest;
use src\Applications\Http\FormRequests\User\UserUpdateRequest;
use src\Applications\Http\FormRequests\User\UserDeleteRequest;
use src\Applications\Http\Factories\User\UserDeleteRequestMapperFactory;
use src\Applications\Http\Factories\User\UserListRequestMapperFactory;
use src\Applications\Http\Factories\User\UserInfoRequestMapperFactory;
use src\Applications\Http\Factories\User\UserCreateRequestMapperFactory;
use src\Applications\Http\Factories\User\UserUpdateRequestMapperFactory;

class UserController extends Controller
{
    public function list(UserListRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserListRequestMapperFactory::make($data);

        $responseMapper = $userService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function info(UserInfoRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserInfoRequestMapperFactory::make($data);

        $responseMapper = $userService->getOne($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function create(UserCreateRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserCreateRequestMapperFactory::make($data);

        $responseMapper = $userService->create($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserUpdateRequestMapperFactory::make($data);

        $responseMapper = $userService->update($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function delete(UserDeleteRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserDeleteRequestMapperFactory::make($data);

        $responseMapper = $userService->delete($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}
