<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
        $cities = City::with('governorate')->paginate();
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('cities.create', compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'governorate_id' => 'required|exists:governorates,id',
        ]);
        $city = City::create($request->only('name', 'governorate_id'));
        return to_route('cities.index')->with('success', 'City created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(city $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(city $city)
    {
        $governorates = Governorate::all();
        return view('cities.edit', compact('city', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, city $city)
    {
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
