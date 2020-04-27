<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use src\Business\Mappers\Role\Request\RoleListRequestMapper;
use src\Business\Mappers\Role\RoleMapper;
use src\Business\Services\RoleService;
use Illuminate\Database\Eloquent\Collection;
use src\Data\Entities\Permission;
use src\Data\Entities\Role;
use src\Data\Repositories\RoleRepository;
use Mockery;

class RoleServiceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function createRoleServiceClass_callGetAllMethodWithRoleListRequestMapper_expectRoleListResponseMapper()
    {
        // Arrange
        $roleCollection       = new Collection();
        $roleMapperCollection = new Collection();

        $permission = new Permission();
        $permission->identifier = 1;
        $permission->name       = "Permission name 1";
        $permissions = new Collection([$permission]);

        for ($i = 1; $i <= 5; $i++) {
            // role model
            $role = new Role();

            $role->identifier = $i;
            $role->name       = 'Role name ' . $i;
            $role->permissions = $permissions;

            $roleCollection->add($role);

            // role mapper
            $roleMapper = new RoleMapper($role->identifier, $role->name);

            $roleMapperCollection->add($roleMapper->toArray());
        }

        $roleRepository = Mockery::mock(RoleRepository::class);
        $roleRepository->shouldReceive('get')->once()->andReturn($roleCollection);

        $roleListRequestMapper = new RoleListRequestMapper();

        $roleService = new RoleService($roleRepository);

        // Act
        $roleListResponseMapper = $roleService->getAll($roleListRequestMapper);

        // Assert
        $this->assertEquals(json_encode($roleMapperCollection), json_encode($roleListResponseMapper->toArray()['data']));
    }
}
