<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DonationRequestResource;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Services\FirebaseService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class DonationRequestController
{
    use ApiResponser;
    public function __construct(public FirebaseService $firebaseService)
    {
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

        $validate = validator()->make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer|min:0',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'client_id' => 'required|exists:clients,id',
            'details' => 'nullable|string',
            'patient_phone_number' => 'required|string|max:255',
            'bags_number' => 'required|integer|min:1'
        ]);

        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }

        $donationRequest = DonationRequest::create($request->only([
            'patient_name', 'patient_age', 'hospital_name', 'hospital_address',
            'city_id', 'blood_type_id', 'client_id', 'notes', 'patient_phone_number', 'bags_number'
        ]));

        $clients = Client::where('city_id', $donationRequest->city_id)
            ->where('blood_type_id', $donationRequest->blood_type_id)
            ->pluck('fcm_token')
            ->toArray();

        // $clients = Client::where('city_id', $donationRequest->city_id)
        //     ->where('blood_type_id', $donationRequest->blood_type_id)
        //     ->pluck('name')
        //     ->toArray();

        if (!empty($clients)) {
            $title = 'There Is A New Donation Request';
            $body = 'There is a new donation request in your city with blood type of ' . $donationRequest->bloodType->name
                . ' and ' . $donationRequest->bags_number . ' bags.';

            $this->firebaseService->sendNotification($clients, $title, $body, [
                'donation_request_id' => $donationRequest->id
            ]);
        }

        return $this->successResponse([
            'donation_request' => new DonationRequestResource($donationRequest),
            'notified_clients' => $clients
        ], 'Donation Request Created Successfully', 201);
    }
}
