<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::where('slug', '=', Role::ADMIN)->first();
        $superAdmin = Role::where('slug', '=', Role::SUPER_ADMIN)->first();
        $user = Role::where('slug', '=', Role::USER)->first();
        $employee = Role::where('slug', '=', Role::EMPLOYEE)->first();

        $admin_permissions = Permission::all();
        Role::findOrFail($admin->id)->permissions()->sync($admin_permissions->pluck('id'));

        $superAdmin_permissions = Permission::all();
        Role::findOrFail($superAdmin->id)->permissions()->sync($superAdmin_permissions->pluck('id'));

        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });

        Role::findOrFail($user->id)->permissions()->sync($user_permissions);

        $employee_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });

        Role::findOrFail($employee->id)->permissions()->sync($employee_permissions);
    }
}
