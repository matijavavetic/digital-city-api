<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\UserService;
use src\Applications\Http\FormRequests\User\UserListRequest;
use src\Applications\Http\Factories\User\UserListRequestMapperFactory;

class UserController extends Controller
{
    public function list(UserListRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserListRequestMapperFactory::make($data);

        $responseMapper = $userService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

  /*  public function info(UserInfoRequest $request, UserService $userService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = UserInfoRequestMapperFactory::make($data);

        $responseMapper = $userService->getOne($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
  */
}
