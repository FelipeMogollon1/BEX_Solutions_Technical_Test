<?php

namespace App\Domain\Actions;

use App\Models\Visit;

class StoreVisitAction
{
    public function execute(array $data): array
    {
        $visit = Visit::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);

        return $visit->toArray();
    }

}
