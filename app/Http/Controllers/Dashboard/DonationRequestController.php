<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donations = DonationRequest::query();

        if (request()->has('search')) {
            $donations->where('name', 'like', '%' . request()->search . '%')
                ->orWhere('email', 'like', '%' . request()->search . '%');
        }

        $donations = $donations->paginate(10);

        return view('donations.index', compact('donations'));
    }

    public function show(DonationRequest $donation)
    {
        return view('donations.show', compact('donation'));
    }
    public function destroy(DonationRequest $donation)
    {
        $donation->delete();
        return to_route('donations.index')->with('Danger', 'Donation deleted successfully.');
    }
}
