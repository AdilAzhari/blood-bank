<?php

namespace App\Http\Controllers;

use App\Models\DonationRequest;

class DonationRequestController
{
    public function index()
    {
        $donations = DonationRequest::all();

        if (request()->has('search')) {
            $donations->where('name', 'like', '%'.request()->search.'%')
                ->orWhere('email', 'like', '%'.request()->search.'%');
        }

        $donations = $donations->paginate(10);

        return view('admin.donations.index', compact('donations'));
    }

    public function show(DonationRequest $donation)
    {
        return view('admin.donations.show', compact('donation'));
    }

    public function destroy(DonationRequest $donation)
    {
        $donation->delete();

        return to_route('donations.index')->with('Danger', 'Donation deleted successfully.');
    }
}
