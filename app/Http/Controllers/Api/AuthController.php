<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CheckAuthLoginPhoneRequest;
use App\Http\Requests\ClientPasswordResetRequest;
use App\Http\Requests\StoreAuthLoginRequest;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\ClientResource;
use App\Http\Resources\DonationRequestResource;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Notification as ModelsNotification;
use App\Models\Token;
use App\Notifications\SendResetPasswordNotification;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController
{
    use ApiResponser;
    public function register(request $request)
    {
        $request->merge([
            'blood_type_id' => BloodType::where('name', $request->blood_type)->first()->id,
        ]);


        $validate = validator()->make($request->all(), [
            'name' => 'required|string|max:255',
            'd_o_b' => 'required|date|before:today',
            'last_donation_date' => 'required|date|before:today',
            'password' => 'required|confirmed',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:255|unique:clients',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required'
        ]);

        $request->merge([
            'password' => bcrypt($request->password),
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

        if (!$client) {
            return $this->errorResponse('Failed to create client', 401);
        }

        Auth::guard('client')->login($client);

            // $api_token = $client->createToken('api_token')->plainTextToken;
        // $api_token = $client->createToken('token')->plainTextToken;
        // $client->api_token = $api_token;
        $client->api_token = str::random(60);

        $client->save();

        return $this->successResponse([
            'api_token' => $client->api_token,
            'client' => new ClientResource($client),
        ], 'Client Created Successfully', 201);
    }

    public function login(Request $request)
    {
        // dd(Auth::guard('client')->user());
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        $client = Client::where('phone', $request->phone)->first();

        if ($client && password_verify($request->password, $client->password)) {
            // $token = $client->createToken('authToken')->plainTextToken;
            // $client->api_token = $token;
            $client->api_token = str::random(60);
            return $this->successResponse([
                'api_token' => $client->api_token,
                'client' => new ClientResource($client),
            ], 'Client Logged In Successfully', 200);
        }

        return $this->errorResponse('Invalid Credentials', 401);
    }

    public function sendResetCode(CheckAuthLoginPhoneRequest $request)
    {

        $client = client::where('phone', $request->phone)->first();
        if ($client->exists()) {
            $resetPassCode = str::random(6);
            $update = $client->update(['pin_code' => $resetPassCode]);

            if ($update) {
                Notification::send($client, new SendResetPasswordNotification($client,$resetPassCode,$request->phone));

                return response()->json(['message' => 'Reset code sent successfully'], 200);
            }
            return $this->errorResponse('Failed to send reset code', 401);
        }

        return $this->errorResponse('Invalid Phone Number', 401);
    }
    public function profile(Request $request)
    {
        $client = Auth::guard('sanctum')->user();
        return new ClientResource($client);
    }
    public function profileUpdate(Request $request)
    {
        $client = Auth::guard('sanctum')->user();

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:clients,email,' . $client->id,
            'phone' => 'sometimes|string|max:15|unique:clients,phone,' . $client->id,
            'password' => 'sometimes|string|min:8|confirmed',
            'd_o_b' => 'sometimes|date|before:today',
            'last_donation_date' => 'sometimes|date|before:today',
            'city_id' => 'sometimes|exists:cities,id',
            'blood_type_id' => 'sometimes|exists:blood_types,id',
            'governorate_id' => 'sometimes|exists:governorates,id',
        ]);

        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        $client->update($request->only([
            'name',
            'email',
            'phone',
            'password',
            'd_o_b',
            'last_donation_date',
            'city_id',
            'blood_type_id',
            'governorate_id',
        ]));

        return new ClientResource($client);

    }

    public function resetPassword(ClientPasswordResetRequest $request)
    {
        $user = Client::where('pin_code', $request->pin_code)->where('pin_code', '!=', null)->first();
        return $user ? ($user->update([
            'password' => bcrypt($request->password),
            'pin_code' => null,
        ])
            ? $this->successResponse(new ClientResource($user), 'Password Has Been Updated Successfully')
            : $this->errorResponse('Failed to update password', 401))
            : $this->errorResponse('This Code Isn\'t Valid', 401);
    }

    public function updateFcmToken(Request $request)
    {
        $validate = validator()->make($request->all(), [
            'client_id' => 'required|exists:clients,id',
            'fcm_token' => 'required|string'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }

        $client = Client::find($request->client_id);
        $token = Token::updateOrCreate(
            ['client_id' => $client->id],
            ['token' => $request->fcm_token]
        );

        return $this->successResponse(null, 'FCM Token updated successfully', 200);
    }
    public function logout(Request $request)
    {
        Auth::guard('client')->logout();
        // $request->user()->currentAccessToken()->delete();
        return $this->successResponse(null, 'Logged out successfully', 200);
    }
}
