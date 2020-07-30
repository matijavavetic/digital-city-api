<?php

namespace src\Providers;

use Illuminate\Support\ServiceProvider;
use src\Data\Repositories\Contracts\IOrganisationRepository;
use src\Data\Repositories\Contracts\IPermissionRepository;
use src\Data\Repositories\Contracts\IRoleRepository;
use src\Data\Repositories\Contracts\ITenderRepository;
use src\Data\Repositories\Contracts\IUserRepository;
use src\Data\Repositories\OrganisationRepository;
use src\Data\Repositories\PermissionRepository;
use src\Data\Repositories\RoleRepository;
use src\Data\Repositories\TenderRepository;
use src\Data\Repositories\UserRepository;

class DependencyConfigurationProvider extends ServiceProvider
{
    public function BindAbstractToConcrete()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IPermissionRepository::class, PermissionRepository::class);
        $this->app->bind(IOrganisationRepository::class, OrganisationRepository::class);
        $this->app->bind(IRoleRepository::class, RoleRepository::class);
        $this->app->bind(ITenderRepository::class, TenderRepository::class);
    }

    public function boot()
    {
        $this->BindAbstractToConcrete();
    }
}
