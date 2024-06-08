<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CheckAuthLoginPhoneRequest;
use App\Http\Requests\StoreAuthLoginRequest;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\ClientResource;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\Client;
use App\Notifications\SendResetPasswordNotification;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

        $client->api_token = str::random(60);
        $client->save();

        return $this->successResponse([
            'api_token' => $client->api_token,
            'client' => new ClientResource($client),
        ], 'Client Created Successfully', 201);
    }

    public function login(StoreAuthLoginRequest $request)
    {
        $client = Client::with('city', 'bloodType')->where('phone', $request->phone)->first();

        if ($client && password_verify($request->password, $client->password)) {
            return $this->successResponse([
                'api_token' => $client->api_token,
                'client' => new ClientResource($client),
            ], 'Client Logged In Successfully', 200);
        }

        return $this->errorResponse('Invalid Credentials', 401);
    }

    public function sendResetCode(CheckAuthLoginPhoneRequest $request)
    {

        $user = client::where('phone', $request->phone)->first();

        if ($user) {
            $resetPassCode = str::random(6);
            $update = $user->update(['pint_code' => $resetPassCode]);
            if ($update) {
                Mail::to($user)->send(new ResetPassword($resetPassCode, $user));
                // mail($user->email, 'Reset Password Code', $resetPassCode);
                // Notification::send($user, new SendResetPasswordNotification($resetPassCode, $user, 'Reset Password Code'));
                return response()->json(['message' => 'Reset code sent successfully'], 200);
            }
            return $this->errorResponse('Failed to send reset code', 401);
        }

        return $this->errorResponse('Invalid Phone Number', 401);
    }
}
