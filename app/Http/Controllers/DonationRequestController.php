<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;
use App\Http\Requests\StoreDonationRequestRequest;
use App\Http\Requests\UpdateDonationRequestRequest;

class DonationRequestController
{
    // public function index()
    // {
    //     $donations = DonationRequest::all();

    //     if (request()->has('search')) {
    //         $donations->where('name', 'like', '%' . request()->search . '%')
    //             ->orWhere('email', 'like', '%' . request()->search . '%');
    //     }

    //     $donations = $donations->paginate(10);

    //     return view('donations.index', compact('donations'));
    // }

    public function show(DonationRequest $donation)
    {
        return view('donations.show', compact('donation'));
    }
    public function destroy(DonationRequest $donation)
    {
        $donation->delete();
        return redirect()->route('donations.index')->with('Danger', 'Donation deleted successfully.');
    }
}
