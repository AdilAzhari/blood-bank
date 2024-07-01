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
    public function index(Request $request)
    {
        $this->authorize('viewAny', Contact::class);

        $contacts = Contact::query();

        if ($request->has('search')) {
            $contacts->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $contacts = $contacts->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', Contact::class);

        $contact->delete();
        return to_route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
