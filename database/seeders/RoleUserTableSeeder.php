<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::where('slug', '=', Role::ADMIN)->first();
        $superAdmin = Role::where('slug', '=', Role::SUPER_ADMIN)->first();
        $user = Role::where('slug', '=', Role::USER)->first();
        $employee = Role::where('slug', '=', Role::EMPLOYEE)->first();

        $user = User::where('email', '=', 'admin@admin.com')->first();
        $user->roles()->sync($admin->id);

        $user = User::where('email', '=', 'zoltan.holanek@sportandbalance.com')->first();
        $user->roles()->sync($superAdmin->id);

        $user = User::where('email', '=', 'zsofia.toth@sportandbalance.com')->first();
        $user->roles()->sync($employee->id);

        $user = User::where('email', '=', 'bence.gal@sportandbalance.com')->first();
        $user->roles()->sync($employee->id);

        $user = User::where('email', '=', 'julia.muller@sportandbalance.com')->first();
        $user->roles()->sync($employee->id);

        $user = User::where('email', '=', 'timea.vanda@sportandbalance.com')->first();
        $user->roles()->sync($employee->id);

        $user = User::where('email', '=', 'zsofia.kiss@sportandbalance.com')->first();
        $user->roles()->sync($employee->id);

        $user = User::where('email', '=', 'jakab.peter@gmail.com')->first();
        $user->roles()->sync($employee->id);

        $user = User::where('email', '=', 'petra.szabados@gmail.com')->first();
        $user->roles()->sync($employee->id);
    }
}
