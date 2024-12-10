<?php

namespace App\Http\Controllers\Api;

use App\Domain\Actions\StoreVisitAction;
use App\Domain\Actions\UpdateVisitAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\StoreVisitRequest;
use App\Http\Requests\Visit\UpdateVisitRequest;
use App\Models\Visit;
use Illuminate\Http\JsonResponse;

class VisitController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Visit::all(), 200);
    }

    public function store(StoreVisitRequest $request, StoreVisitAction $storeVisitAction): JsonResponse
    {
        $visit = $storeVisitAction->execute($request->validated());
        return response()->json($visit, 201);
    }

    public function show(string $id): JsonResponse
    {
        $visit = Visit::find($id);

        if (!$visit) {
            return response()->json(['error' => 'Visit not found '], 404);
        }
        return response()->json($visit, 200);
    }

    public function update(UpdateVisitRequest $request, string $id, UpdateVisitAction $updateVisitAction): JsonResponse
    {
        if (!is_numeric($id) || $id <= 0) {
            return response()->json(['error' => 'Bad Request'], 400);
        }

        $visit = $updateVisitAction->execute($id, $request->validated());

        return response()->json($visit, 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = Visit::destroy($id);

        if (!$deleted) {
            return response()->json(['error' => 'Visit not found or could not be deleted'], 404);
        }

        return response()->json(['message' => 'Visit successfully deleted'], 200);
    }
}
