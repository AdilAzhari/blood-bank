<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BloodType;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', BloodType::class);

        $bloodTypes = BloodType::all();

        return view('admin.bloodType.index', compact('bloodTypes'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BloodType $bloodType)
    {
        $this->authorize('view', BloodType::class);

        return view('admin.bloodType.show', compact('bloodType'));
    }
}
