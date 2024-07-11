<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'postsCount' => Post::count(),
            'bloodTypesCount' => BloodType::count(),
            'clientsCount' => Client::count(),
            'citiesCount' => City::count(),
            'categoriesCount' => Category::count(),
            'governoratesCount' => Governorate::count(),
            'donationsCount' => DonationRequest::count(),
            'contactsCount' => Contact::count(),
            'rolesCount' => Role::count(),
            'permissionsCount' => Permission::count(),
            'usersCount' => User::count(),
            'settingsCount' => Setting::count(),
        ]);
    }
}
