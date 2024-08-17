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
        // $this->authorize('viewAny', DonationRequest::class);

        $donations = DonationRequest::query();

        if (request()->has('search')) {
            $donations->where('name', 'like', '%' . request()->search . '%')
                ->orWhere('email', 'like', '%' . request()->search . '%');
        }

        $donations = $donations->paginate(10);

        return view('admin.donations.index', compact('donations'));
    }

    public function restores(){

    }

    public function show(DonationRequest $donation)
    {
        // $this->authorize('view', DonationRequest::class);

        return view('admin.donations.show', compact('donation'));
    }
    public function destroy(DonationRequest $donation)
    {
        $this->authorize('delete', DonationRequest::class);

        $donation->delete();

        return to_route('donations.index')->with('Danger', 'Donation deleted successfully.');
    }

    public function trash()
    {
        // $this->authorize('viewAny', DonationRequest::class);

        // $donations = DonationRequest::onlyTrashed()->paginate(10);

        // return view('admin.donations.trashed', compact('donations'));
    }

    public function restore($id)
    {
        $this->authorize('restore', DonationRequest::class);

        $donation = DonationRequest::onlyTrashed()->find($id);

        if ($donation) {
            $donation->restore();
        }

        return redirect()->route('donations.index')->with('success', 'Donation restored successfully.');
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', DonationRequest::class);

        $donation = DonationRequest::onlyTrashed()->find($id);

        if ($donation) {
            $donation->forceDelete();
        }

        return redirect()->route('donations.index')->with('danger', 'Donation deleted successfully.');
    }
}
