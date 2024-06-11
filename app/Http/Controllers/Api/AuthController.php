<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CheckAuthLoginPhoneRequest;
use App\Http\Requests\ClientPasswordResetRequest;
use App\Http\Requests\DonationRequestRequest;
use App\Http\Requests\StoreAuthLoginRequest;
use Illuminate\Support\Facades\Notification;
use App\Http\Resources\ClientResource;
use App\Http\Resources\DonationRequestResource;
use App\Mail\ResetPassword;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Notification as ModelsNotification;
use App\Models\Token;
use App\Notifications\SendResetPasswordNotification;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        return $this->successResponse([
            'api_token' => $client->api_token,
            'client' => new ClientResource($client),
        ], 'Client Created Successfully', 201);
    }

    public function login(StoreAuthLoginRequest $request)
    {
        $client = Client::with('city', 'bloodType')
            ->where([
                'phone' => $request->phone,
                'api_token' => $request->api_token,
            ])->first();

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
    // }
    // public function profile(Request $request)
    // {
    //     $client = auth()->user();
    //     if ($request->has('password')) {
    //         $request->merge(['password' => bcrypt($request->password)]);
    //     }
    //     if ($request->has('governorate_id')) {
    //         $client->cities()->sync($request->governorate_id);
    //         $request->merge(['city_id' => $request->governorate_id]);
    //     }
    //     if ($request->has('blood_type_id')) {
    //         $bloodType = BloodType::where('name', $request->blood_type)->first();
    //         $client->bloodType()->sync($bloodType->id);
    //         $request->merge(['blood_type_id' => $request->blood_type_id,]);
    //     }
    //     $client->update($request->all());
    //     $client->save();

    //     return $this->successResponse(new ClientResource($client), 'Profile Updated Successfully');
    // }

    public function resetPassword(ClientPasswordResetRequest $request)
    {
        $user = Client::where('pin_code', $request->pin_code)->where('pin_code', '!=', 0)->first();

        return $user ? ($user->update([
            'password' => bcrypt($request->password),
            'pin_code' => null,
        ])
            ? $this->successResponse(new ClientResource($user), 'Password Has Been Updated Successfully')
            : $this->errorResponse('Failed to update password', 401))
            : $this->errorResponse('This Code Isn\'t Valid', 401);
    }

    public function createDonationRequest(Request $request)
    {
        if ($request->has('blood_type')) {
            $bloodType = BloodType::where('name', $request->blood_type)->first();
            if (!$bloodType) {
                return $this->errorResponse('Invalid blood type', 422);
            }
            $request->merge(['blood_type_id' => $bloodType->id]);
        }

        if ($request->has('city_id')) {
            $city = City::where('id', $request->city_id)->first();
            if (!$city) {
                return $this->errorResponse('Invalid city', 422);
            }
            $request->merge(['city_id' => $city->id]);
        }
        // dd($city);

        $validate = validator()->make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer|min:0',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'client_id' => 'required|exists:clients,id',
            'notes' => 'nullable|string'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }

        $donationRequest = DonationRequest::create([
            'patient_name' => $request->patient_name,
            'patient_age' => $request->patient_age,
            'hospital_name' => $request->hospital_name,
            'hospital_address' => $request->hospital_address,
            'city_id' => $request->city_id,
            'blood_type_id' => $request->blood_type_id,
            'client_id' => $request->client_id,
            'details' => $request->details,
            'patient_phone_number' => $request->patient_phone_number,
            'bags_number' => $request->bags_number,
        ]);

        $clients = Client::where('city_id', $donationRequest->city_id)
            ->where('blood_type_id', $donationRequest->blood_type_id)
            ->pluck('name')
            ->toArray();


        $notification = ModelsNotification::create([
            'title' => 'There Is A New Donation Request',
            'content' => 'There is a new donation request in your city with blood type of ' . $donationRequest->bloodType->name
                . ' and ' . $donationRequest->bags_number . ' bags.',
            'donation_request_id' => $donationRequest->id,
        ]);

        // $notification->clients()->attach($clients);
        $donationRequest->notifications()->save($notification);

        $tokens = Token::whereIn('client_id', $clientIds)
            ->where('token', '!=', null)
            ->pluck('token')
            ->toArray();

        if (count($tokens)) {
            $title = 'There Is A New Donation Request';
            $body = 'There is a new donation request in your city with blood type of ' . $donationRequest->bloodType->name
                . ' and ' . $donationRequest->bags_number . ' bags.';
            $data = [
                'donation_request_id' => $donationRequest->id
            ];

            $send = notifyByFirebase($title, $body, $tokens, $data);
            info('firebase result: ' . $send);
            info('data: ' . json_encode($data));
        }
        return $this->successResponse([
            'donation_request' => new DonationRequestResource($donationRequest)
        ], 'Donation Request Created Successfully', 201);
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
}
