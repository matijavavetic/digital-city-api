<?php

namespace src\Data\Repositories;

use Illuminate\Support\Facades\DB;
use src\Data\Entities\Contracts\IUserEntity;
use src\Data\Entities\Permission;
use src\Data\Entities\Role;
use src\Data\Entities\User;
use src\Data\Mappers\UserCollectionMapper;
use src\Data\Mappers\UserRelationsCollection;
use src\Data\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{
    public function get(string $sort) : UserCollectionMapper
    {
        $userEntity = new User();

        $users = $userEntity
            ->orderBy('id', $sort)
            ->get();

        $usersCollection = new UserCollectionMapper();

        foreach($users as $user) {
            $usersCollection->tack($user);
        }

        return $usersCollection;
    }

    public function getWith(string $sort, array $relations) : UserCollectionMapper
    {
        $userEntity = new User();

        $users = $userEntity
            ->orderBy('id', $sort)
            ->with($relations)
            ->get();

        $usersCollection = new UserCollectionMapper();

        foreach($users as $user) {
            $usersCollection->tack($user);
        }

        return $usersCollection;
    }

    public function findOne(string $identifier) : IUserEntity
    {
        $user = new User();

        return $user
            ->where('identifier', $identifier)
            ->first();
    }

    public function findOneWith(string $identifier, array $relations) : IUserEntity
    {
        $user = new User();

        return $user
            ->where('identifier', $identifier)
            ->with($relations)
            ->first();
    }

    public function findOneByEmail(string $email) : IUserEntity
    {
        $user = new User();

        return $user
            ->where('email', $email)
            ->first();
    }

    public function findOneByEmailAndAccessToken(string $email, string $accessToken) : IUserEntity
    {
        $user = new User();

        return $user
            ->where('email', $email)
            ->where('access_token', $accessToken)
            ->first();
    }

    public function store(IUserEntity $user, UserRelationsCollection $relations) : void
    {
        DB::transaction(function() use ($user, $relations) {
            $user->save();

            if(empty($relations) === false) {
                foreach ($relations as $relation) {
                    if ($relation instanceof Role) {
                        $user->roles()->save($relation);
                    } elseif ($relation instanceof Permission) {
                        $user->permissions()->save($relation);
                    }
                }
            }
        });
    }

    public function destroy(IUserEntity $user) : bool
    {
        return $user->delete();
    }

    public function findOneByAccessToken(string $accessToken) : IUserEntity
    {
        $user = new User();

        return $user
            ->where('access_token', $accessToken)
            ->first();
    }
}
