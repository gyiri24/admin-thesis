<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        $userRole = Role::where('slug', '=', Role::USER)->first();

        $firstNames = [
            'Anna', 'Béla', 'Cecília', 'Dániel', 'Emília', 'Ferenc', 'Gábor', 'Hanna', 'István', 'János',
            'Katalin', 'Lajos', 'Mária', 'Nóra', 'Orsolya', 'Péter', 'Quentin', 'Róbert', 'Szabolcs', 'Tamás',
            'Ulrik', 'Vanda', 'Zsófia', 'Adél', 'Bence', 'Csaba', 'Dóra', 'Edina', 'Fanni', 'Gergő',
            'Hedvig', 'Ibolya', 'Judit', 'Krisztián', 'László', 'Magdolna', 'Nikolett', 'Ottó', 'Pálma', 'Rita',
            'Sára', 'Tibor', 'Ubul', 'Viktor', 'Zoltán', 'Ádám', 'Bálint', 'Csongor', 'Denes', 'Eszter'
        ];

        $lastNames = [
            'Adorján', 'Bajnai', 'Csonka', 'Dudás', 'Erdélyi',
            'Farkas', 'Győri', 'Hajdu', 'Illés', 'Juhász',
            'Király', 'Lakatos', 'Magyar', 'Nagy', 'Orosz',
            'Papp', 'Rácz', 'Sánta', 'Takács', 'Urbán',
            'Varga', 'Zombori', 'Ács', 'Bakos', 'Csaba',
            'Dömötör', 'Éliás', 'Fehér', 'Gál', 'Hegedűs',
            'Iványi', 'Jeney', 'Kovács', 'Lakner', 'Molnár',
            'Németh', 'Orbán', 'Pintér', 'Rajkai', 'Sipos',
            'Tóth', 'Ujvári', 'Vámos', 'Zakariás', 'Árpád',
            'Báthory', 'Czeglédi', 'Dienes', 'Egyed', 'Fodor'
        ];

        $amount = [
            7000, 8000, 9000, 10000, 11000,
            12000, 13000, 14000, 15000, 16000,
            17000, 18000, 19000, 20000, 21000,
            22000, 23000, 24000, 25000, 26000,
            27000, 28000, 29000, 30000, 35000,
            40000, 45000, 50000, 55000, 60000,
            65000, 70000, 75000, 80000, 85000,
            87000, 80000, 75000, 70000, 65000,
            60000, 55000, 50000, 45000, 40000,
            35000, 30000, 29000, 28000, 27000
        ];


        for($x = 0; $x <= 100; $x++) {
            $randomFirst = array_rand($firstNames);
            $randomLast = array_rand($lastNames);
            $randomAmount = array_rand($amount);

            $name = mb_strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $firstNames[$randomFirst])) . mb_strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $lastNames[$randomLast]));

            $user = User::create([
                'name' => $name,
                'first_name' => $firstNames[$randomFirst],
                'last_name' => $lastNames[$randomLast ],
                'email' => $name . '@gmail.com',
                'email_verified_at' => now(),
                'amount' => $amount[$randomAmount],
                'password' =>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'verified' => 1,
                'verified_at' => now(),
                'verified' => 1,
                'remember_token' => Str::random(10),
                'newsletter' => true,
            ]);

            $user->roles()->sync($userRole->id);
        }
    }

}
