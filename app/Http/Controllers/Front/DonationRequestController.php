<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequestRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Notifications\DonationRequestNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
class DonationRequestController extends Controller
{
    public function create()
    {
        $bloodTypes = BloodType::all();
        $cities = City::all();
        $governorates = Governorate::all();
        return view('front.ask-donation', compact('bloodTypes', 'cities', 'governorates'));
    }

    public function store(StoreDonationRequestRequest $request)
    {
        $donationRequest = DonationRequest::create([
            'patient_name' => $request->patient_name,
            'patient_age' => $request->patient_age,
            'bags_number' => $request->bags_number,
            'hospital_name' => $request->hospital_name,
            'hospital_address' => $request->hospital_address,
            'patient_phone_number' => $request->patient_phone_number,
            'details' => $request->details,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city_id' => $request->city_id,
            'blood_type_id' => $request->blood_type_id,
            'client_id' => Auth::guard('client')->id(),
        ]);

        $clients = Client::where('blood_type_id', $request->blood_type_id)
                         ->where('city_id', $request->city_id)
                         ->get();

        Notification::send($clients, new DonationRequestNotification($donationRequest));

        return redirect()->route('donation-request.create')->with('success', 'Donation request created successfully.');
    }
}
