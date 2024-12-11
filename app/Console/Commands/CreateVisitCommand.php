<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CreateVisitCommand extends Command
{
    protected $signature = 'visits:create';
    protected $description = 'Create a new visit via API';

    public function handle()
    {
        $name = $this->ask('Enter the name of the visit');
        $email = $this->ask('Enter the email of the visit');
        $latitude = $this->ask('Enter the latitude of the visit (between -90 and 90)');
        $longitude = $this->ask('Enter the longitude of the visit (between -180 and 180)');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Invalid email address.');
            return Command::FAILURE;
        }

        if ($latitude < -90 || $latitude > 90 || $longitude < -180 || $longitude > 180) {
            $this->error('Invalid coordinates.');
            return Command::FAILURE;
        }

        $response = Http::post('http://127.0.0.1:8000/api/v1/visits', [
            'name' => $name,
            'email' => $email,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        if ($response->successful()) {
            $this->info('Visit created successfully.');
        } else {
            $this->error('Failed to create visit: ' . $response->body());
        }

        return Command::SUCCESS;
    }
}
