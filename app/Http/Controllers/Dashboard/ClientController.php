<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $this->authorize('viewAny', Client::class);

        $filters = $request->only(['name', 'status']);
        $clients = Client::with('governorates')->filter($filters)->latest()->paginate(10);

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        $this->authorize('update', $client);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $client->id,
            'd_o_b' => 'required|date',
            'phone' => 'required|string|max:255',
            'last_donation_date' => 'required|date',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'password' => 'nullable|string|min:8|confirmed',
            'governorate_id' => 'required|exists:governorates,id',
            'status' => 'nullable',
        ]);
        $client->update($request->only([
            'name',
            'email',
            'd_o_b',
            'phone',
            'last_donation_date',
            'city_id',
            'blood_type_id',
            'password' => bcrypt($request->password),
            'status'
        ]));

        $client->governorates()->sync($request->governorate_id);

        return to_route('clients.index')->with('info', 'Client updated successfully');
    }
    public function show(client $client)
    {
        $this->authorize('view', $client);

        return view('admin.clients.show', compact('client'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        return to_route('clients.index')->with('Danger', 'Client deleted successfully');
    }

    public function trash()
    {
        $this->authorize('viewAny', Client::class);

        $trashedClients = Client::onlyTrashed()->paginate(10);

        return view('admin.clients.trash', compact('trashedClients'));
    }

    public function restore($id)
    {
        $this->authorize('restore', Client::class);

        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();

        return to_route('clients.index')->with('info', 'Client restored successfully');
    }

    public function forceDelete($id)
    {
        $this->authorize('forceDelete', Client::class);

        $client = Client::onlyTrashed()->findOrFail($id);
        $client->forceDelete();

        return to_route('clients.index')->with('Danger', 'Client permanently deleted');
    }
}
