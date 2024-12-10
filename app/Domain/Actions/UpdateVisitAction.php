<?php

namespace App\Domain\Actions;

use App\Models\Visit;

class UpdateVisitAction
{
    public function execute(int $id, array $data): array
    {
        $visit = Visit::find($id);

        if (!$visit) {
            return ['error' => 'Visit not found'];
        }

        $visit->update([
            'name' => $data['name'] ?? $visit->name,
            'email' => $data['email'] ?? $visit->email,
            'latitude' => $data['latitude'] ?? $visit->latitude,
            'longitude' => $data['longitude'] ?? $visit->longitude,
        ]);

        return $visit->toArray();
    }
}
