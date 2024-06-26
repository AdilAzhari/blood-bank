<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(request $request)
    {

        $bloodTypes = BloodType::all();
        $cities = City::all();
        $articles = Post::take(9)->get();
        $donationRequests = DonationRequest::take(8)->get();
        return view('front.home', compact('articles', 'donationRequests', 'bloodTypes', 'cities'));
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
        $query = DonationRequest::with(['bloodType', 'city']);

        if ($request->has('blood_type_id') && $request->blood_type_id) {
            $query->whereHas('bloodType', function ($q) use ($request) {
                $q->where('id', $request->blood_type_id);
            });
        }

        if ($request->has('city_id') && $request->city_id) {
            $query->whereHas('city', function ($q) use ($request) {
                $q->where('id', $request->city_id);
            });
        }

        $donationRequests = $query->paginate(8);
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

    public function toggle(Post $post)
    {
        $user = Auth::guard('client')->user();
        if ($user->favorites()->where('post_id', $post->id)->exists()) {
            $user->favorites()->detach($post->id);
        } else {
            $user->favorites()->attach($post->id);
        }

        return redirect()->back();
    }
}
