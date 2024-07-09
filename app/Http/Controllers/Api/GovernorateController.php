<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Resources\GovernorateResource;
use App\Models\Governorate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class GovernorateController
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governorates = Governorate::with('cities')->get();
        return $this->successResponse(GovernorateResource::collection($governorates));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGovernorateRequest $request)
    {
        $governorate = Governorate::create($request->only('name'));
        return $this->successResponse(new GovernorateResource($governorate));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'string|max:255',
        ]);
        $governorate = Governorate::findOrFail($id);
        if ($request->name == $governorate->name) {
            return $this->errorResponse('The name is the same', 422);
        }
        $governorate->update($request->only('name'));
        return $this->successResponse(new GovernorateResource($governorate));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $governorate = Governorate::findOrFail($id);

        if ($governorate->cities()->exists()) {
            return $this->errorResponse('This governorate has cities', 422);
        }

        $governorate->delete();

        return $this->successResponse(new GovernorateResource($governorate));
    }
}
