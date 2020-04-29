<?php

namespace src\Business\Services;

use Illuminate\Database\QueryException;
use Ramsey\Uuid\Uuid;
use src\Business\Factories\Tender\TenderInfoResponseMapperFactory;
use src\Business\Factories\Tender\TenderListResponseMapperFactory;
use src\Business\Mappers\Tender\Request\TenderInfoRequestMapper;
use src\Business\Mappers\Tender\Request\TenderListRequestMapper;
use src\Business\Mappers\Tender\Response\TenderInfoResponseMapper;
use src\Business\Mappers\Tender\Response\TenderListResponseMapper;
use src\Data\Entities\Role;
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
}
