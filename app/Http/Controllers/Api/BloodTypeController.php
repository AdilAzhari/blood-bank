<?php

namespace App\Http\Controllers\Api;

use App\Models\BloodType;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BloodTypeController
{
    use ApiResponser;
    public function index()
    {
        // $bloodTypes = BloodType::with('clients')->get();
        // return $this->successResponse($bloodTypes, 'Blood Types Retrieved Successfully');
    }
    public function show(BloodType $bloodType)
    {
        return $this->successResponse($bloodType, 'Blood Type Retrieved Successfully');
    }
    public function store(Request $request)
    {
        $validate = validator()->make($request->all(), [
            'name' => 'required|string|max:255|unique:blood_types',
        ]);
        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }
        $bloodType = BloodType::create($request->all());
        return $this->successResponse($bloodType, 'Blood Type Created Successfully', 201);
    }
    public function update(Request $request, BloodType $bloodType)
    {
        $validate = validator()->make($request->all(), [
            'name' => 'required|string|max:255|unique:blood_types,name,' . $bloodType->id,
        ]);
        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }
        $bloodType->update($request->all());
        return $this->successResponse($bloodType, 'Blood Type Updated Successfully');
    }
    public function destroy(BloodType $bloodType)
    {
        $bloodType->delete();
        return $this->successResponse(null, 'Blood Type Deleted Successfully');
    }
}
