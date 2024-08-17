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
    public function index(Request $request)
    {
        $this->authorize('viewAny', city::class);

        $cities = City::filterByName($request->name)
        ->paginate(10);

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

        City::create($request->only('name', 'governorate_id'));

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
        return view('admin.cities.edit', compact('city', 'governorates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, city $city)
    {
        $city->update($request->only('name', 'governorate_id'));

        return to_route('cities.index')->with('success', 'City updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $this->authorize('delete', city::class);

        $city->delete();

        return to_route('cities.index')->with('Danger', 'City deleted successfully');
    }

    public function trash()
    {
        $this->authorize('viewAny', City::class);

        $trashedCities = City::onlyTrashed()->paginate(10);
        return view('cities.trash', compact('trashedCities'));
    }

    public function restore($id)
    {
        $this->authorize('update', City::class);

        $city = City::withTrashed()->find($id);
        if ($city) {
            $city->restore();
        }
        return redirect()->route('cities.trash')->with('success', 'City restored successfully.');
    }

    public function forceDelete($id)
    {
        $this->authorize('delete', City::class);

        $city = City::withTrashed()->find($id);
        if ($city) {
            $city->forceDelete();
        }
        return redirect()->route('cities.trash')->with('success', 'City permanently deleted.');
    }
}
