<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {

        $user = User::with('roles')->where('id', auth()->id())->first();
        $role = $user->roles()->get()->pluck('name')->flatten()->toArray();
        $permissions = Role::with('permissions')->where('name', $role)->get()->pluck('permissions')->flatten()->pluck('name')->toArray();
        // $this->authorize('viewAny', $user);
        if(in_array('viewAny-client', $permissions)){
            $clients = Client::with('governorates')->latest()->paginate(10);
            return view('clients.index', compact('clients'));
        }

        // foreach ($permissions as $permission) {
        //     if ($permission == 'viewAny-client') {
        //         $clients = Client::with('governorates')->latest()->paginate(10);
        //         return view('clients.index', compact('clients'));
        //     }
        // }
        // dd($user->roles()->get(), $permissions);
        // foreach ($permissions as $permission) {
        //     dd($permission->name);
        //     // if ($key == 'viewAny-client') {
        //     //     $clients = Client::with('governorates')->latest()->paginate(10);
        //     //     return view('clients.index', compact('clients'));
        //     // }
        // }


        // $filters = $request->only(['name', 'status']);
        // $clients = Client::with('governorates')->filter($filters)->latest()->paginate(10);
        // return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Client::class);
        $cities = City::all();
        $bloodTypes = BloodType::all();
        $governorates = Governorate::all();
        return view('clients.create', compact('cities', 'bloodTypes', 'governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Client::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'd_o_b' => 'required|date',
            'phone' => 'required|string|max:255',
            'last_donation_date' => 'required|date',
            'city_id' => 'required|exists:cities,id',
            'blood_type_id' => 'required|exists:blood_types,id',
            'password' => 'required|string|min:8|confirmed',
            'governorate_id' => 'required|exists:governorates,id',
            'status' => 'in:active,inactive'
        ]);
        $client = Client::create($request->only([
            'name',
            'email',
            'd_o_b',
            'phone',
            'last_donation_date',
            'city_id',
            'blood_type_id',
            'password' => bcrypt($request->password),
            'status',
        ]));

        $client->governorates()->attach($request->governorate_id);

        return to_route('clients.index')->with('success', 'Client created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        // $this->authorize('view', $client);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        $this->authorize('update', $client);
        $cities = City::all();
        $bloodTypes = BloodType::all();
        $governorates = Governorate::all();
        return view('clients.edit', compact('client', 'cities', 'bloodTypes', 'governorates'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();
        return to_route('clients.index')->with('Danger', 'Client deleted successfully');
    }
}
