<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Models\Governorate;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MainController
{
    use ApiResponser;

    public function index()
    {
        return response()->json([
            'message' => 'Hello World'
        ]);
    }

    public function governorates()
    {
        $governorates = Governorate::all();
        return $this->customResponse(
            'success',
            'Hello World',
            $governorates,
            200
        );
    }
    public function cities(request $request){
        $cities =   City::where('governorate_id', $request->governorate_id)->get();
        // return $cities;
        return $this->successResponse(
            $cities,
            'Hello World',
            200
        );
        // return $this->customResponse(
        //     'success',
        //     'Hello World',
        //     $cities,
        //     200
        // );
    }
}
