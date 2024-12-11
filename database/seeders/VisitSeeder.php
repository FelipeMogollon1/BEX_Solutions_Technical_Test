<?php

namespace Database\Seeders;

use App\Models\Visit;
use Illuminate\Database\Seeder;

class VisitSeeder extends Seeder
{
    public function run()
    {
        $visits = [
            [
                "name" => "Maria García",
                "email" => "maria.garcia@example.com",
                "latitude" => 4.60971,
                "longitude" => -74.08175
            ],
            [
                "name" => "Carlos Pérez",
                "email" => "carlos.perez@example.com",
                "latitude" => 6.2442,
                "longitude" => -75.5812
            ],
            [
                "name" => "Ana Torres",
                "email" => "ana.torres@example.com",
                "latitude" => 3.4372,
                "longitude" => -76.5225
            ],
            [
                "name" => "Luis Gómez",
                "email" => "luis.gomez@example.com",
                "latitude" => 10.9685,
                "longitude" => -74.7813
            ],
            [
                "name" => "Sandra Martínez",
                "email" => "sandra.martinez@example.com",
                "latitude" => 11.2408,
                "longitude" => -74.199
            ],
            [
                "name" => "Fernando Rojas",
                "email" => "fernando.rojas@example.com",
                "latitude" => 7.1139,
                "longitude" => -73.1198
            ],
            [
                "name" => "Carmen López",
                "email" => "carmen.lopez@example.com",
                "latitude" => 8.7489,
                "longitude" => -75.8814
            ],
            [
                "name" => "Diego Ramírez",
                "email" => "diego.ramirez@example.com",
                "latitude" => 4.1448,
                "longitude" => -73.6266
            ],
            [
                "name" => "Laura Herrera",
                "email" => "laura.herrera@example.com",
                "latitude" => 2.9273,
                "longitude" => -75.2819
            ],
            [
                "name" => "Jorge Castillo",
                "email" => "jorge.castillo@example.com",
                "latitude" => 12.5833,
                "longitude" => -81.7006
            ],
        ];

        foreach ($visits as $visit) {
            Visit::create($visit);
        }
    }
}
