<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'admin']);

        $entities = ['role', 'permission', 'user'];
        $actions = ['viewAny', 'view',  'create', 'update', 'delete', 'restore'];

        //* $adminPermissions =
        collect($entities)->flatMap(function ($entity) use ($actions) {
            return collect($actions)->map(function ($action) use ($entity) {
                return Permission::create(['name' => "{$entity}:{$action}"]);
            });
        });
        Permission::create(['name' => 'role:assign']);
        Permission::create(['name' => 'permission:assign']);

        $statsPermissions = Permission::create(['name' => 'stats:view']);

        $role = Role::create(['name' => 'editor']);
        $permission = [
            Permission::create(['name' => 'post:viewAny']),
            Permission::create(['name' => 'post:view']),
            Permission::create(['name' => 'post:create']),
            Permission::create(['name' => 'post:update']),
            Permission::create(['name' => 'post:delete']),
            Permission::create(['name' => 'post:restore']),
            Permission::create(['name' => 'news:viewAny']),
            Permission::create(['name' => 'news:view']),
            Permission::create(['name' => 'news:create']),
            Permission::create(['name' => 'news:update']),
            Permission::create(['name' => 'news:delete']),
            Permission::create(['name' => 'news:restore']),
        ];
        $role->syncPermissions($permission);

        $role = Role::create(['name' => 'customer']);

        $role = Role::create(['name' => 'helpdesk-support']);
        $helpDeskPermission = [
            Permission::create(['name' => 'chat:viewAny']),
            Permission::create(['name' => 'chat:view']),
            Permission::create(['name' => 'chat:create']),
            Permission::create(['name' => 'chat:update']),
            Permission::create(['name' => 'chat:delete']),
            Permission::create(['name' => 'chat:restore']),

            Permission::create(['name' => 'email:viewAny']),
            Permission::create(['name' => 'email:view']),
            Permission::create(['name' => 'email:create']),
            Permission::create(['name' => 'email:update']),
            Permission::create(['name' => 'email:delete']),
            Permission::create(['name' => 'email:restore']),
        ];

        $role->syncPermissions($helpDeskPermission);


        $role = Role::create(['name' => 'shop-manager']);
        $entities = ['order', 'product', 'stock', 'category', 'review', 'attribute', 'value', 'deliver-method', 'payment-type', 'discount'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore'];

        // Asosiy permissionlarni yaratish
        $permissions = collect($entities)->flatMap(function ($entity) use ($actions) {
            return collect($actions)->map(function ($action) use ($entity) {
                return Permission::create(['name' => "{$entity}:{$action}"]);
            });
        });

        // Qo'shimcha permissionlar
        $additionalPermissions = [
            Permission::create(['name' => 'deliver-method:switch']),
            Permission::create(['name' => 'payment-type:switch']),
        ];

        // Barcha permissionlarni birlashtirish
        $first = $permissions->merge($additionalPermissions);
        $allPermissions = $first->merge($helpDeskPermission);


        // Role ga permissionlarni biriktirish
        $role->syncPermissions($allPermissions);
    }
}
