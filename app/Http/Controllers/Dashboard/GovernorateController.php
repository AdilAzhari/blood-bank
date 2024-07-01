<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Governorate::class);

        $governorates = Governorate::paginate(10);
        return view('admin.governorates.index', compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Governorate::class);

        return view('admin.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Governorate::class);

        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $governorate = Governorate::create($request->only('name'));
        return to_route('governorates.index')->with('success', 'Governorate created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Governorate $governorate)
    {
        $this->authorize('view', Governorate::class);

        return view('admin.governorates.show', compact('governorate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $governorate = Governorate::findOrFail($id);
        return view('admin.governorates.edit',compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->authorize('update', Governorate::class);

        $request->validate([
            'name' => 'required|string|max:255|min:3',
        ]);
        $governorate = Governorate::findOrFail($id);
        $governorate->update($request->only('name'));

        return to_route('governorates.index')->with('info', 'Governorate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete', Governorate::class);

        $governorate = Governorate::findOrFail($id);
        $governorate->delete();

        return to_route('governorates.index')->with('Danger', 'Governorate deleted successfully');
    }
}
