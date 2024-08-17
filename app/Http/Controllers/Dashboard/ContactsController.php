<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Contact::class);

        $contact = Contact::first()->get();

        return view('admin.contacts.index', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $this->authorize('update', Contact::class);

        $request->validate([
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'fb_link' => 'required|string|url|max:255',
            'tw_link' => 'required|string|url|max:255',
            'insta_link' => 'required|string|url|max:255',
        ]);

        $contact->update($request->all());

        return redirect()->back()->with('success', 'Contact updated successfully.');
    }
}
