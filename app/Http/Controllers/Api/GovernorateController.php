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
        return $this->successResponse( GovernorateResource::collection($governorates), 'Governorates Retrieved Successfully');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGovernorateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
