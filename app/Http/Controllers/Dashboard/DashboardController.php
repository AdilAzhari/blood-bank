<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $categoryCount = Category::count();
        $cityCount = City::count();
        $postCount = Post::count();
        $governorateCount = Governorate::count();
        $contactCount = Contact::count();
        $donationCount = DonationRequest::count();
        $settingsCount = Setting::count();
        $usersCount = User::count();

        return view('dashboard', compact('categoryCount', 'usersCount', 'cityCount', 'postCount', 'governorateCount', 'contactCount', 'donationCount', 'settingsCount'));
    }
}
