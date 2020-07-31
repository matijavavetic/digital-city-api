<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Contracts\IUserEntity;
use src\Data\Mappers\UserCollectionMapper;
use src\Data\Mappers\UserRelationsCollection;

interface IUserRepository
{
    public function get(string $sort) : UserCollectionMapper;
    public function getWith(string $sort, array $relations) : UserCollectionMapper;
    public function findOne(string $identifier) : IUserEntity;
    public function findOneWith(string $identifier, array $relations) : IUserEntity;
    public function findOneByAccessToken(string $accessToken) : IUserEntity;
    public function findOneByEmailAndAccessToken(string $email, string $accessToken) : IUserEntity;
    public function findOneByEmail(string $email) : IUserEntity;
    public function store(IUserEntity $user, UserRelationsCollection $relations) : void;
    public function destroy(IUserEntity $user) : bool;
}
