<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use src\Applications\Http\Factories\Tender\TenderDeleteRequestMapperFactory;
use src\Applications\Http\Factories\Tender\TenderInfoRequestMapperFactory;
use src\Applications\Http\Factories\Tender\TenderListRequestMapperFactory;
use src\Applications\Http\Factories\Tender\TenderCreateRequestMapperFactory;
use src\Applications\Http\Factories\Tender\TenderUpdateRequestMapperFactory;
use src\Applications\Http\FormRequests\Tender\TenderDeleteRequest;
use src\Applications\Http\FormRequests\Tender\TenderInfoRequest;
use src\Applications\Http\FormRequests\Tender\TenderListRequest;
use src\Applications\Http\FormRequests\Tender\TenderCreateRequest;
use src\Applications\Http\FormRequests\Tender\TenderUpdateRequest;
use src\Business\Services\TenderService;
use Symfony\Component\HttpFoundation\Response;

class TenderController extends Controller
{
    public function list(TenderListRequest $request, TenderService $tenderService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = TenderListRequestMapperFactory::make($data);

        $responseMapper = $tenderService->getAll($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }


    public function info(TenderInfoRequest $request, TenderService $tenderService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = TenderInfoRequestMapperFactory::make($data);

        $responseMapper = $tenderService->getOne($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }


    public function create(TenderCreateRequest $request, TenderService $tenderService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = TenderCreateRequestMapperFactory::make($data);

        $responseMapper = $tenderService->create($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function update(TenderUpdateRequest $request, TenderService $tenderService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = TenderUpdateRequestMapperFactory::make($data);

        $responseMapper = $tenderService->update($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_CREATED);
    }

    public function delete(TenderDeleteRequest $request, TenderService $tenderService) : JsonResponse
    {
        $data = $request->validationData();

        $requestMapper = TenderDeleteRequestMapperFactory::make($data);

        $responseMapper = $tenderService->delete($requestMapper);

        return new JsonResponse($responseMapper, Response::HTTP_OK);
    }
}
