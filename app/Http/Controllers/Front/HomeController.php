<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Foundation\Console\AboutCommand;

class HomeController extends Controller
{

    public function index()
    {
        $articles = Post::take(9)->get();
        $donationRequests = DonationRequest::all();

        return view('front.home', compact('articles', 'donationRequests'));
    }

    public function about()
    {
        $about = Setting::all();
        return view('front.about',compact('about'));
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

    public function donationRequest()
    {
        $filter = request()->only('city','bloodType');
        $bloodTypes = BloodType::all();
        $cities = City::all();
        $donationRequests = DonationRequest::with(['bloodType', 'city'])->filter($filter)->paginate(8);
        return view('front.donationRequest', compact('donationRequests', 'bloodTypes','cities'));
    }

    public function insideRequest(DonationRequest $donationRequest)
    {
        return view('front.inside-requests', compact('donationRequest'));
    }

    public function article()
    {
        $article = Post::first();
        return view('front.articles', compact('article'));
    }

    public function donationRequestDetails($id)
    {
        $donationRequest = DonationRequest::find($id);
        return view('front.donation-request-details', compact('donationRequest'));
    }

    public function toggleFavouritPost(reqest $reqest){
        $toggle =   $reqest->user()->
    }
}
