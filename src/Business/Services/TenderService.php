<?php

namespace src\Business\Services;

use Illuminate\Database\QueryException;
use Ramsey\Uuid\Uuid;
use src\Business\Factories\Tender\TenderCreateResponseMapperFactory;
use src\Business\Factories\Tender\TenderDeleteResponseMapperFactory;
use src\Business\Factories\Tender\TenderInfoResponseMapperFactory;
use src\Business\Factories\Tender\TenderListResponseMapperFactory;
use src\Business\Factories\Tender\TenderUpdateResponseMapperFactory;
use src\Business\Mappers\Tender\Request\TenderCreateRequestMapper;
use src\Business\Mappers\Tender\Request\TenderDeleteRequestMapper;
use src\Business\Mappers\Tender\Request\TenderInfoRequestMapper;
use src\Business\Mappers\Tender\Request\TenderListRequestMapper;
use src\Business\Mappers\Tender\Request\TenderUpdateRequestMapper;
use src\Business\Mappers\Tender\Response\TenderCreateResponseMapper;
use src\Business\Mappers\Tender\Response\TenderDeleteResponseMapper;
use src\Business\Mappers\Tender\Response\TenderInfoResponseMapper;
use src\Business\Mappers\Tender\Response\TenderListResponseMapper;
use src\Business\Mappers\Tender\Response\TenderUpdateResponseMapper;
use src\Data\Entities\Role;
use src\Data\Entities\Tender;
use src\Data\Enums\HttpStatusCode;
use src\Data\Repositories\RoleRepository;
use src\Business\Factories\Role\RoleInfoResponseMapperFactory;
use src\Business\Mappers\Role\Response\RoleInfoResponseMapper;
use src\Business\Mappers\Role\Response\RoleDeleteResponseMapper;
use src\Business\Mappers\Role\Response\RoleListResponseMapper;
use src\Business\Mappers\Role\Request\RoleListRequestMapper;
use src\Business\Mappers\Role\Request\RoleInfoRequestMapper;
use src\Business\Mappers\Role\Request\RoleDeleteRequestMapper;
use src\Business\Factories\Role\RoleListResponseMapperFactory;
use src\Business\Factories\Role\RoleDeleteResponseMapperFactory;
use src\Business\Mappers\Role\Response\RoleCreateResponseMapper;
use src\Business\Mappers\Role\Request\RoleUpdateRequestMapper;
use src\Business\Factories\Role\RoleCreateResponseMapperFactory;
use src\Business\Factories\Role\RoleUpdateResponseMapperFactory;
use src\Business\Mappers\Role\Request\RoleCreateRequestMapper;
use src\Business\Mappers\Role\Response\RoleUpdateResponseMapper;
use src\Data\Repositories\TenderRepository;

class TenderService
{
    private TenderRepository $tenderRepository;

    public function __construct(TenderRepository $tenderRepository)
    {
        $this->tenderRepository = $tenderRepository;
    }

    public function getAll(TenderListRequestMapper $mapper): TenderListResponseMapper
    {
        $tenders = $this->tenderRepository->get($mapper->getSort());

        $responseMapper = TenderListResponseMapperFactory::make($tenders);

        return $responseMapper;
    }

    public function getOne(TenderInfoRequestMapper $mapper) : TenderInfoResponseMapper
    {
        $tender = $this->tenderRepository->findOne($mapper->getIdentifier());

        $responseMapper = TenderInfoResponseMapperFactory::make($tender);

        return $responseMapper;
    }

    public function create(TenderCreateRequestMapper $mapper) : TenderCreateResponseMapper
    {
        $tender = new Tender();

        $tender->identifier = $mapper->getIdentifier();
        $tender->name = $mapper->getName();
        $tender->type = $mapper->getType();
        $tender->created_by_user_id = $mapper->getCreatedByUser();
        $tender->organisation_id = $mapper->getOrganisation();
        $tender->date_from = $mapper->getDateFrom();
        $tender->date_to = $mapper->getDateTo();

        $stored = null;

        $stored = $this->tenderRepository->store($tender);

        if ($stored === false) {
            throw new \Exception("Failed to store new tender!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = TenderCreateResponseMapperFactory::make($tender);

        return $responseMapper;
    }

    public function update(TenderUpdateRequestMapper $mapper) : TenderUpdateResponseMapper
    {
        $tender = $this->tenderRepository->findOne($mapper->getIdentifier());

        if ($mapper->getName() !== null) {
            $tender->name = $mapper->getName();
        }

        if ($mapper->getType() !== null) {
            $tender->type = $mapper->getType();
        }

        if ($mapper->getDateFrom() !== null) {
            $tender->date_from = $mapper->getDateFrom();
        }

        if ($mapper->getDateTo() !== null) {
            $tender->date_to = $mapper->getDateTo();
        }

        $stored = null;

        $stored = $this->tenderRepository->store($tender);

        if ($stored === false) {
            throw new \Exception("Failed to update existing tender!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = TenderUpdateResponseMapperFactory::make($tender);

        return $responseMapper;
    }

    public function delete(TenderDeleteRequestMapper $mapper) : TenderDeleteResponseMapper
    {
        $tender = $this->tenderRepository->findOne($mapper->getIdentifier());

        $stored = null;

        $stored = $this->tenderRepository->destroy($tender);

        if ($stored === false) {
            throw new \Exception("Failed to delete tender!", HttpStatusCode::HTTP_BAD_REQUEST);
        }

        $responseMapper = TenderDeleteResponseMapperFactory::make($tender);

        return $responseMapper;
    }
}
