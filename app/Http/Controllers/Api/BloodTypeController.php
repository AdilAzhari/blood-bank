<?php

namespace App\Http\Controllers\Api;

use App\Models\BloodType;
use App\Traits\ApiResponser;

class BloodTypeController
{
    use ApiResponser;

    public function index()
    {
        $bloodTypes = BloodType::with('clients')->get();

        return $this->successResponse($bloodTypes, 'Blood Types Retrieved Successfully');
    }
}
