<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', city::class);

        $cities = City::with('governorate')->paginate();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('view', city::class);

        $governorates = Governorate::all();
        return view('admin.cities.create', compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $this->authorize('create', city::class);

        $city = City::create($request->only('name', 'governorate_id'));
        return to_route('cities.index')->with('success', 'City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(city $city)
    {
        $this->authorize('view', city::class);

        return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(city $city)
    {
        $this->authorize('create', city::class);

        $governorates = Governorate::all();
        return view('cities.edit', compact('city', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, city $city)
    {
        $this->authorize('update', city::class);

        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'governorate_id' => 'required|exists:governorates,id',
        ]);
        $city->update($request->only('name', 'governorate_id'));
        return to_route('cities.index')->with('success', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $this->authorize('delete', city::class);

        // $city->clients()->each(function ($client) {
        //     $client->delete();
        // });
        // $city->clients()->update(['city_id' => null]);
        // print($city->clients()->to);
        // foreach ($city->clients as $client) {
        //     $client->update(['city_id' => null]);
        // }
        // governorate::where('city_id', $city->id)->update(['city_id' => null]);
        $city->delete();

        return to_route('cities.index')->with('Danger', 'City deleted successfully');
    }
}
