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
        $bloodTypes = BloodType::all();
        return view('bloodType.index',compact('bloodTypes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BloodType $bloodType)
    {
        return view('bloodType.show', compact('bloodType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodType $bloodType)
    {
        return view('bloodType.edit', compact('bloodType'))->with('Info', 'Blood Type Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodType $bloodType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $bloodType->update($request->all());
        return to_route('bloodType.index')->with('Info', 'Blood Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodType $bloodType)
    {
        $bloodType->delete();
        return to_route('bloodType.index')->with('Danger', 'Blood Type Deleted Successfully');
    }
}
