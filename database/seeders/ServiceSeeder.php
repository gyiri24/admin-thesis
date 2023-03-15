<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personalTrainer = User::where('name', '=', User::GAL_BENCE)->first();
        $treatment = User::where('name', '=', User::KISS_ZSOFIA)->first();
        $personalMasseur = User::where('name', '=', User::MULLER_JULIA)->first();
        $physicalTherapist = User::where('name', '=', User::VANDA_TIMEA)->first();

        Service::updateOrCreate(
            [
                'slug' => 'halfPersonalTraining',
            ],
            [
                'price' => 6000,
                'name' => 'Személyi edzés',
                'qr_code' => Str::random(16),
                'duration' => 30,
                'slug' => 'halfPersonalTraining',
                'user_id' => $personalTrainer['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'fullPersonalTraining',
            ],
            [
                'price' => 10000,
                'name' => 'Személyi edzés teljes',
                'qr_code' => Str::random(16),
                'duration' => 60,
                'slug' => 30,
                'slug' => 'fullPersonalTraining',
                'user_id' => $personalTrainer['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'tensTreatment',
            ],
            [
                'price' => 8000,
                'name' => 'Tens kezelés',
                'qr_code' => Str::random(16),
                'duration' => 15,
                'slug' => 'tensTreatment',
                'user_id' => $treatment['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'interferenceTreatment',
            ],
            [
                'price' => 8000,
                'name' => 'Interferencia kezelés',
                'qr_code' => Str::random(16),
                'duration' => 20,
                'slug' => 'interferenceTreatment',
                'user_id' => $treatment['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'ultrasoundTreatment',
            ],
            [
                'price' => 8000,
                'name' => 'Ultrahang kezelés',
                'qr_code' => Str::random(16),
                'duration' => 10,
                'slug' => 'ultrasoundTreatment',
                'user_id' => $treatment['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'halfSportMassage',
            ],
            [
                'price' => 4500,
                'name' => 'Sportmasszás',
                'qr_code' => Str::random(16),
                'duration' => 30,
                'slug' => 'halfSportMassage',
                'user_id' => $personalMasseur['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'fullSportMassage',
            ],
            [
                'price' => 7000,
                'name' => 'Sportmasszás teljes',
                'qr_code' => Str::random(16),
                'duration' => 60,
                'slug' => 'fullSportMassage',
                'user_id' => $personalMasseur['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'halfTherapeuticMassage',
            ],
            [
                'price' => 4500,
                'name' => 'Gyógymasszázs',
                'qr_code' => Str::random(16),
                'duration' => 30,
                'slug' => 'halfTherapeuticMassage',
                'user_id' => $personalMasseur['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'fullTherapeuticMassage',
            ],
            [
                'price' => 9000,
                'name' => 'Gyógymasszázs teljes',
                'qr_code' => Str::random(16),
                'duration' => 60,
                'slug' => 'fullTherapeuticMassage',
                'user_id' => $personalMasseur['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'halfMedicalGymnastics',
            ],
            [
                'price' => 3500,
                'name' => 'Gyógytorna',
                'qr_code' => Str::random(16),
                'duration' => 30,
                'slug' => 'halfMedicalGymnastics',
                'user_id' => $physicalTherapist['id'],
            ]
        );

        Service::updateOrCreate(
            [
                'slug' => 'fullMedicalGymnastics',
            ],
            [
                'price' => 7000,
                'name' => 'Gyógytorna teljes',
                'qr_code' => Str::random(16),
                'duration' => 60,
                'slug' => 'fullMedicalGymnastics',
                'user_id' => $physicalTherapist['id'],
            ]
        );
    }
}
