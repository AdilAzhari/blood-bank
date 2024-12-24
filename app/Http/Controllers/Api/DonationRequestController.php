<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DonationRequestResource;
use App\Models\BloodType;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Notifications\DonationRequestNotification;
use App\Services\FirebaseService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DonationRequestController
{
    use ApiResponser;

    public function __construct(public FirebaseService $firebaseService) {}

    public function index()
    {

        $donationRequests = DonationRequest::all();

        if (! $donationRequests->exists()) {
            return $this->errorResponse('No Donation Requests Found', 404);
        }

        return $this->successResponse(DonationRequestResource::collection($donationRequests), 'Donation Requests Retrieved Successfully');
    }

    public function createDonationRequest(Request $request)
    {
        if ($request->has('blood_type')) {
            $bloodType = BloodType::where('name', $request->blood_type)->first();
            if (! $bloodType) {
                return $this->errorResponse('Invalid blood type', 422);
            }
            $request->merge(['blood_type_id' => $bloodType->id]);
        }

        $validate = validator()->make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|integer',
            'bags_number' => 'required|integer|min:1|max:5',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:255',
            'patient_phone_number' => 'required|string|max:19',
            'details' => 'required|string',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'client_id' => 'required|exists:clients,id',
        ]);

        if ($validate->fails()) {
            return $this->errorResponse($validate->errors()->first(), 422);
        }

        $donationRequest = DonationRequest::create($request->only([
            'patient_name', 'patient_age', 'hospital_name', 'hospital_address',
            'city_id', 'blood_type_id', 'client_id', 'details', 'patient_phone_number', 'bags_number',
        ]));

        $clients = Client::where('city_id', $donationRequest->city_id)
            ->where('blood_type_id', $donationRequest->blood_type_id)
            ->get();

        if ($clients->isEmpty()) {
            return $this->errorResponse('No Clients Found', 404);
        }

        Notification::send($clients, new DonationRequestNotification($donationRequest));

        return $this->successResponse([
            'donation_request' => new DonationRequestResource($donationRequest),
            'notified_clients' => $clients,
        ], 'Donation Request Created Successfully', 201);
    }

    public function show($id)
    {
        $donationRequest = DonationRequest::find($id); // DonationRequest::where('id', $id)->first();

        if (! $donationRequest->exists()) {
            return $this->errorResponse('Donation Request Not Found', 404);
        }

        return $this->successResponse(new DonationRequestResource($donationRequest), 'Donation Request Retrieved Successfully');
    }
}
