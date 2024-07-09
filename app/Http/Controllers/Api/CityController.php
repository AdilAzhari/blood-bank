<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CityController
{
    use ApiResponser;

    public function index()
    {
        $cities = City::all();
        return $this->successResponse($cities, 'Cities Retrieved Successfully');
    }
}
