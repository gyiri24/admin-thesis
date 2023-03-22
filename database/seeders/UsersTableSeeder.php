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

        $user = Role::where('slug', '=', Role::USER)->first();
        $array = [77000, 70000, 21000, 14000, 32000, 64000, 11000, 4000, 63000, 54000, 41000, 48000, 34000, 31000, 3000, 9000, 14000, 81000, 36000];

        for($x = 0; $x <= 100; $x++) {
            $randomIndex = array_rand($array, 1);
            $user = User::create([

            ]);

        }
    }

}
