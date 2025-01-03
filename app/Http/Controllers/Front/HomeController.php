<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(request $request)
    {
        $bloodTypes = BloodType::all();
        $cities = City::all();
        $articles = Post::take(9)->get();
        $donationRequests = DonationRequest::take(8)->latest()->get();
        $Setting = Setting::first();

        return view('front.home', compact('articles', 'donationRequests', 'bloodTypes', 'cities', 'Setting'));
    }

    public function about()
    {
        $about = Setting::all();

        return view('front.about', compact('about'));
    }

    public function contactUs()
    {
        $Setting = Setting::first();

        return view('front.contact-us', compact('Setting'));
    }

    public function whoAreUs()
    {
        $about = Setting::pluck('about_app')->first();

        return view('front.who-are-us', compact('about'));
    }

    public function donationRequest(Request $request)
    {
        $donations = DonationRequest::query();

        if ($request->has('blood_type_id') && $request->blood_type_id != '') {
            $donations->where('blood_type_id', $request->blood_type_id);
        }

        if ($request->has('city_id') && $request->city_id != '') {
            $donations->where('city_id', $request->city_id);
        }

        $donationRequests = $donations->paginate(8);
        $bloodTypes = BloodType::all();
        $cities = City::all();
        $articles = Post::take(9)->get();

        return view('front.donationRequest', compact('articles', 'donationRequests', 'bloodTypes', 'cities'));
    }

    public function insideRequest(DonationRequest $donationRequest)
    {
        return view('front.inside-requests', compact('donationRequest'));
    }

    public function article()
    {
        $articles = Post::all();
        $Article = $articles->first();

        return view('front.articles', compact('articles', 'Article'));
    }

    public function showArticle(Post $post)
    {
        $articles = Post::all();
        $article = $post;

        return view('front.showArticle', compact('articles', 'article'));
    }

    public function donationRequestDetails($id)
    {
        $donationRequest = DonationRequest::find($id);

        return view('front.donation-request-details', compact('donationRequest'));
    }
}
