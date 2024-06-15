<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bloodType.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bloodType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bloodType = BloodType::findOrFail($id);
        return view('bloodType.show', compact('bloodType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bloodType = BloodType::findOrFail($id);
        return view('bloodType.edit', compact('bloodType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $bloodType = BloodType::findOrFail($id);
        $bloodType->update($request->all());
        return redirect()->route('bloodType.index')->with('Info', 'Blood Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bloodType = BloodType::findOrFail($id);
        $bloodType->delete();
        return redirect()->route('bloodType.index')->with('Danger', 'Blood Type Deleted Successfully');
    }
}
