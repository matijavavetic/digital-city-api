<?php

namespace src\Data\Repositories\Contracts;

use src\Data\Entities\Contracts\IUserEntity;

interface IUserRepository
{
    public function get(string $sort);
    public function getWith(string $sort, array $relations);
    public function findOne(string $identifier);
    public function findOneWith(string $identifier, array $relations);
    public function findOneByAccessToken(string $accessToken);
    public function findOneByEmailAndAccessToken(string $email, string $accessToken);
    public function findOneByEmail(string $email);
    public function store(IUserEntity $user);
    public function destroy(IUserEntity $user);
}
