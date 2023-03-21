<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        /*$users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => '',
                'last_name'          => '',
                'amount'             => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'holanekzoli',
                'email'              => 'zoltan.holanek@sportandbalance.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Holanek',
                'last_name'          => 'Zoltán',
                'amount'             => '',
            ],
            [
                'id'                 => 3,
                'name'               => 'tothzsofia',
                'email'              => 'zsofia.toth@sportandbalance.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Tóth',
                'last_name'          => 'Zsófia',
                'amount'             => '',
            ],
            [
                'id'                 => 4,
                'name'               => 'galbence',
                'email'              => 'bence.gal@sportandbalance.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Gál',
                'last_name'          => 'Bence',
                'amount'             => '',
            ],
            [
                'id'                 => 5,
                'name'               => 'mullerjulia',
                'email'              => 'julia.muller@sportandbalance.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Müller',
                'last_name'          => 'Júlia',
                'amount'             => '',
            ],
            [
                'id'                 => 6,
                'name'               => 'vandatimea',
                'email'              => 'timea.vanda@sportandbalance.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Vanda',
                'last_name'          => 'Tímea',
                'amount'             => '',
            ],
            [
                'id'                 => 7,
                'name'               => 'kisszsofia',
                'email'              => 'zsofia.kiss@sportandbalance.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Kiss',
                'last_name'          => 'Zsófia',
                'amount'             => '',
            ],
            [
                'id'                 => 8,
                'name'               => 'jakabpeter',
                'email'              => 'jakab.peter@gmail.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Jakab',
                'last_name'          => 'Péter',
                'amount'             => '',
            ],
            [
                'id'                 => 9,
                'name'               => 'szabadospetra',
                'email'              => 'petra.szabados@gmail.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'verified'           => 1,
                'verified_at'        => '2023-03-12 17:47:30',
                'verification_token' => '',
                'first_name'         => 'Szabados',
                'last_name'          => 'Petra',
                'amount'             => '',
            ],
        ];

        User::insert($users);*/

        User::factory()
        ->count(100)
        ->create();

        $user = Role::where('slug', '=', Role::USER)->first();

        User::where('amount', '>', 0)->each(function ($user) {
            $user->roles()->sync($user->id);
        });
    }
}
