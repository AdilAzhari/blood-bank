<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreAuthLoginRequest;
use App\Models\BloodType;
use App\Models\Client;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController
{
    use ApiResponser;
    public function register(request $request)
    {
        $validate = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:clients',
            'd_o_b' => 'required|date|before:today',
            'last_donation_date' => 'required|date|before:today',
            'phone' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'blood_type' => 'required',
            'city_id' => 'required|exists:cities,id|numeric|not_in:0',
        ]);
        $request->merge([
            'password' => bcrypt($request->password),
            'blood_type_id' => BloodType::where('name', $request->blood_type)->first()->id,
        ]);

        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }
        $client = Client::create($request->only(
            'name',
            'email',
            'phone',
            'd_o_b',
            'last_donation_date',
            'password',
            'city_id',
            'blood_type_id'
        ));
        $client->api_token = str::random(60);
        $client->save();
        return $this->successResponse([
            'api_token' => $client->api_token,
            'client' => $client,
        ], 'Client Created Successfully', 201);
    }

    public function login(Request $request)
    {
        $validate = validator()->make($request->all(), [
            'phone' => 'required|exists:clients',
            'password' => 'required|string',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }

        $client = Client::with('city', 'bloodType')->where('phone', $request->phone)->first();

        if ($client && password_verify($request->password, $client->password)) {
            return $this->successResponse([
                'api_token' => $client->api_token,
                'client' => $client,
            ], 'Client Logged In Successfully', 200);
        }

        return $this->errorResponse('Invalid Credentials', 401);
    }
}
