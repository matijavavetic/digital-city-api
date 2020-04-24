<?php

namespace src\Business\Services;

use Illuminate\Database\QueryException;
use src\Business\Factories\Organisation\OrganisationCreateResponseMapperFactory;
use src\Business\Factories\Organisation\OrganisationUpdateResponseMapperFactory;
use src\Business\Mappers\Organisation\Request\OrganisationDeleteRequestMapper;
use src\Business\Mappers\Organisation\Request\OrganisationUpdateRequestMapper;
use src\Business\Mappers\Organisation\Response\OrganisationDeleteResponseMapper;
use src\Business\Mappers\Organisation\Response\OrganisationUpdateResponseMapper;
use src\Data\Entities\Organisation;
use src\Business\Mappers\Organisation\Request\OrganisationCreateRequestMapper;
use src\Business\Mappers\Organisation\Response\OrganisationCreateResponseMapper;
use src\Data\Repositories\OrganisationRepository;
use src\Business\Mappers\Organisation\Request\OrganisationListRequestMapper;
use src\Business\Mappers\Organisation\Request\OrganisationInfoRequestMapper;
use src\Business\Mappers\Organisation\Response\OrganisationInfoResponseMapper;
use src\Business\Mappers\Organisation\Response\OrganisationListResponseMapper;
use src\Business\Factories\Organisation\OrganisationListResponseMapperFactory;
use src\Business\Factories\Organisation\OrganisationDeleteResponseMapperFactory;
use src\Business\Factories\Organisation\OrganisationInfoResponseMapperFactory;

class OrganisationService
{
    private OrganisationRepository $organisationRepository;

    public function __construct(OrganisationRepository $organisationRepository)
    {
        $this->organisationRepository = $organisationRepository;
    }

    public function getAll(OrganisationListRequestMapper $mapper) : OrganisationListResponseMapper
    {
        if ($mapper->getRelations() !== null) {
            $users = $this->organisationRepository->getWith($mapper->getSort(), $mapper->getRelations());
        } else {
            $users = $this->organisationRepository->get($mapper->getSort());
        }

        $responseMapper = OrganisationListResponseMapperFactory::make($users);

        return $responseMapper;
    }

    public function getOne(OrganisationInfoRequestMapper $mapper) : OrganisationInfoResponseMapper
    {
        if ($mapper->getRelations() !== null) {
            $user = $this->organisationRepository->findOneWith($mapper->getIdentifier(), $mapper->getRelations());
        } else {
            $user = $this->organisationRepository->findOne($mapper->getIdentifier());
        }

        $responseMapper = OrganisationInfoResponseMapperFactory::make($user);

        return $responseMapper;
    }

    public function create(OrganisationCreateRequestMapper $mapper) : OrganisationCreateResponseMapper
    {
        $organisation = new Organisation();

        $organisation->identifier = $mapper->getIdentifier();
        $organisation->name = $mapper->getName();
        $organisation->city = $mapper->getCity();
        $organisation->county = $mapper->getCounty();
        $organisation->country = $mapper->getCountry();
        $organisation->primary_color = $mapper->getPrimaryColor();
        $organisation->secondary_color = $mapper->getSecondaryColor();
        $organisation->tertiary_color = $mapper->getTertiaryColor();
        $organisation->description = $mapper->getDescription();
        $organisation->logo = $mapper->getLogo();

        $stored = null;

        $stored = $this->organisationRepository->store($organisation);

        if ($stored === false) {
            throw new \Exception("Failed to store new organisation!", 400);
        }

        $responseMapper = OrganisationCreateResponseMapperFactory::make($organisation);

        return $responseMapper;
    }

    public function update(OrganisationUpdateRequestMapper $mapper) : OrganisationUpdateResponseMapper
    {
        $user = $this->organisationRepository->findOne($mapper->getIdentifier());

        if ($mapper->getUsername() !== null) {
            $user->username = $mapper->getUsername();
        }

        if ($mapper->getEmail() !== null) {
            $user->email = $mapper->getEmail();
        }

        if ($mapper->getPassword() !== null) {
            $user->password = $mapper->getPassword();
        }

        if ($mapper->getFirstName() !== null) {
            $user->firstname = $mapper->getFirstName();
        }

        if ($mapper->getLastName() !== null) {
            $user->lastname = $mapper->getLastName();
        }

        if ($mapper->getBirthDate() !== null) {
            $user->birth_date = $mapper->getBirthDate();
        }

        if ($mapper->getCountry() !== null) {
            $user->country = $mapper->getCountry();
        }

        if ($mapper->getCity() !== null) {
            $user->city = $mapper->getCity();
        }

        $stored = null;

        $stored = $this->organisationRepository->store($organisation);

        if ($stored === false) {
            throw new \Exception("Failed to update existing organisation!", 400);
        }

        $responseMapper = OrganisationUpdateResponseMapperFactory::make($organisation);

        return $responseMapper;
    }

    public function delete(OrganisationDeleteRequestMapper $mapper) : OrganisationDeleteResponseMapper
    {
        $organisation = $this->organisationRepository->findOne($mapper->getIdentifier());

        $stored = null;

        $stored = $this->organisationRepository->destroy($organisation);

        if ($stored === false) {
            throw new \Exception("Failed to delete organisation!", 400);
        }

        $responseMapper = OrganisationDeleteResponseMapperFactory::make($organisation);

        return $responseMapper;
    }
}
