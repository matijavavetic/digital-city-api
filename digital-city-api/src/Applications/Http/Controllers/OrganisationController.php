<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use src\Business\Services\OrganisationService;
use src\Applications\Http\FormRequests\Organisation\OrganisationListRequest;
use src\Applications\Http\FormRequests\Organisation\OrganisationInfoRequest;
use src\Applications\Http\FormRequests\Organisation\OrganisationUsersRequest;
use src\Applications\Http\FormRequests\Organisation\OrganisationCreateRequest;
use src\Applications\Http\FormRequests\Organisation\OrganisationUpdateRequest;
use src\Applications\Http\FormRequests\Organisation\OrganisationDeleteRequest;
use src\Applications\Http\Factories\Organisation\OrganisationListRequestMapperFactory;
use src\Applications\Http\Factories\Organisation\OrganisationInfoRequestMapperFactory;
use src\Applications\Http\Factories\Organisation\OrganisationUsersRequestMapperFactory;
use src\Applications\Http\Factories\Organisation\OrganisationCreateRequestMapperFactory;
use src\Applications\Http\Factories\Organisation\OrganisationUpdateRequestMapperFactory;
use src\Applications\Http\Factories\Organisation\OrganisationDeleteRequestMapperFactory;

class OrganisationController extends Controller
{
    public function list(OrganisationListRequest $request, OrganisationService $organisationService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = OrganisationListRequestMapperFactory::make($data);

        $responseMapper = $organisationService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function info(OrganisationInfoRequest $request, OrganisationService $organisationService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = OrganisationInfoRequestMapperFactory::make($data);

        $responseMapper = $organisationService->getOne($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function users(OrganisationUsersRequest $request, OrganisationService $organisationService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = OrganisationUsersRequestMapperFactory::make($data);

        $responseMapper = $organisationService->getUsers($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }

    public function create(OrganisationCreateRequest $request, OrganisationService $organisationService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = OrganisationCreateRequestMapperFactory::make($data);

        $responseMapper = $organisationService->create($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function update(OrganisationUpdateRequest $request, OrganisationService $organisationService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = OrganisationUpdateRequestMapperFactory::make($data);

        $responseMapper = $organisationService->update($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function delete(OrganisationDeleteRequest $request, OrganisationService $organisationService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = OrganisationDeleteRequestMapperFactory::make($data);

        $responseMapper = $organisationService->delete($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}
