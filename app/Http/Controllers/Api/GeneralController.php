<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BloodTypeResource;
use App\Http\Resources\CityResource;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\Governorate;
use App\Models\Setting;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\BodyParam;

class GeneralController extends Controller
{
    use ApiResponser;

    public function governorates()
    {
        $governorates = Governorate::all();

        return $this->successResponse($governorates, 'Governorates Retrieved Successfully');
    }

    public function cities()
    {
        $cities = City::all();

        return $this->successResponse(CityResource::collection($cities), 'Cities Retrieved Successfully');
    }

    public function settings()
    {
        $settings = Setting::first();

        return $this->successResponse($settings, 'Settings Retrieved Successfully');
    }

    #[BodyParam('name', 'string', 'Name of the category.', true, 'Clothing')]
    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        return $this->successResponse($contact, 'Message Sent Successfully');
    }

    public function categories()
    {
        $categories = Category::all();

        return $this->successResponse($categories, 'Categories Retrieved Successfully');
    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();

        return $this->successResponse(BloodTypeResource::collection($bloodTypes), 'Blood Types Retrieved Successfully');
    }
}
