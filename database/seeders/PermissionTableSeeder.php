<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'tasks-list',
           'tasks-create',
           'tasks-edit',
           'tasks-delete',
           'calendar-list',
           'calendar-create',
           'calendar-edit',
           'calendar-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }

        // create roles and assign created permissions

        $role = Role::create(['name' => 'Admin'])
            ->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Manager'])
            ->givePermissionTo([
                'tasks-list',
                'tasks-create',
                'tasks-edit',
                'tasks-delete',
                'user-list',
                'calendar-list',
                'calendar-create',
                'calendar-edit',
                'calendar-delete'
            ]);

        $role = Role::create(['name' => 'Creator'])
            ->givePermissionTo([
                'tasks-list',
                'tasks-edit',
                'calendar-list',
                'calendar-create',
                'calendar-edit',
                'calendar-delete',
            ]);


    }
}
