<?php

namespace src\Data\Repositories\Contracts;

use src\Business\Mappers\User\Request\Contracts\IUserCreateRequestMapper;
use src\Data\Entities\Contracts\IUserEntity;
use src\Data\Mappers\UserCollectionMapper;

interface IUserRepository
{
    public function get(string $sort) : UserCollectionMapper;
    public function getWith(string $sort, array $relations) : UserCollectionMapper;
    public function findOne(string $identifier) : IUserEntity;
    public function findOneWith(string $identifier, array $relations) : IUserEntity;
    public function findOneByAccessToken(string $accessToken) : IUserEntity;
    public function findOneByEmailAndAccessToken(string $email, string $accessToken) : IUserEntity;
    public function findOneByEmail(string $email) : IUserEntity;
    public function store(IUserEntity $user, IUserCreateRequestMapper $mapper);
    public function destroy(IUserEntity $user) : bool;
}
