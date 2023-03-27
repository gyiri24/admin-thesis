<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
use App\Models\Role;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::where('slug', '=', Role::USER)->first();

        $createdAt = Carbon::create(2023, rand(1, 3), rand(1, 28), rand(8, 17), rand(0, 1) * 30);

        for ($i = 1; $i <= 500; $i++) {
            $service = Service::inRandomOrder()->first();
            $user = User::whereHas('roles', function($query) use($userRole) {
                $query->where('id', '=',  $userRole->id);
            })->inRandomOrder()->first();

            $createdAt = Carbon::create(2023, rand(1, 3), rand(1, 28), rand(8, 17), rand(0, 1) * 30);

            if($createdAt->isWeekday()) {
                Transaction::create([
                    'service_id' => $service->id,
                    'price' => $service->price,
                    'user_id' => $user->id,
                    'created_at' => $createdAt->toDateTimeString(),
                ]);

                $createdAt->addMinutes(rand(15, 45));
            }
        }
    }
}
