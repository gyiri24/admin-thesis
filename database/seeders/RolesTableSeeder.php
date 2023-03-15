<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Adminisztrátor',
                'slug' => 'admin',
            ],
            [
                'id'    => 2,
                'title' => 'Felhasználó',
                'slug' => 'user',
            ],
            [
                'id'    => 3,
                'title' => 'Employee',
                'slug' => 'employee',
            ],
            [
                'id'    => 4,
                'title' => 'Szuper Adminisztrátor',
                'slug' => 'super',
            ],
        ];

        Role::insert($roles);
    }
}
