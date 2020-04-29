<?php

namespace src\Applications\Http\Controllers;

use Illuminate\Http\JsonResponse;
use src\Applications\Http\Factories\Tender\TenderListRequestMapperFactory;
use src\Applications\Http\FormRequests\Tender\TenderListRequest;
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

    public function info() : JsonResponse
    {
    }

    public function create() : JsonResponse
    {
    }

    public function update() : JsonResponse
    {
    }

    public function delete() : JsonResponse
    {
    }
}
