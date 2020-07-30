<?php

namespace src\Data\Repositories;

use src\Data\Entities\Contracts\IUserEntity;
use src\Data\Entities\User;
use src\Data\Mappers\UserCollectionMapper;
use src\Data\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{
    public function get(string $sort) : UserCollectionMapper
    {
        $users = new User();

        $users->orderBy('id', $sort)->get();

        $userCollection = new UserCollectionMapper();

        foreach($users as $user) {
            $userCollection->tack($user);
        }

        return $userCollection;
    }

    public function getWith(string $sort, array $relations)
    {
        $user = new User();

        return $user
            ->orderBy('id', $sort)
            ->with($relations)
            ->get();
    }

    public function findOne(string $identifier)
    {
        $user = new User();

        return $user
            ->where('identifier', $identifier)
            ->first();
    }

    public function findOneWith(string $identifier, array $relations)
    {
        $user = new User();

        return $user
            ->where('identifier', $identifier)
            ->with($relations)
            ->first();
    }

    public function findOneByEmail(string $email)
    {
        $user = new User();

        return $user
            ->where('email', $email)
            ->first();
    }

    public function findOneByEmailAndAccessToken(string $email, string $accessToken)
    {
        $user = new User();

        return $user
            ->where('email', $email)
            ->where('access_token', $accessToken)
            ->first();
    }

    public function store(IUserEntity $user)
    {
        return $user->save();
    }

    public function destroy(IUserEntity $user)
    {
        return $user->delete();
    }

    public function findOneByAccessToken(string $accessToken)
    {
        $user = new User();

        return $user
            ->where('access_token', $accessToken)
            ->first();
    }
}
