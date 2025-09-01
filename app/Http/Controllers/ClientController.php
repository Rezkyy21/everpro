<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdAccount;
use App\Models\AdCampaign;
use App\Models\AdPlatform;

class ClientController extends Controller
{
    /**
     * Menampilkan dashboard utama untuk client.
     */
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $adAccounts = AdAccount::where('user_id', $user->id)->with('platform')->get();
        $problemAds = AdCampaign::whereHas('adAccount', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('status', 'problem')
        ->get();
        return view('client.dashboard', compact('user', 'adAccounts', 'problemAds'));
    }
    
    /**
     * Menampilkan halaman platform iklan.
     */
    public function showAdPlatforms()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $platforms = AdPlatform::all();
        $adAccounts = AdAccount::where('user_id', $user->id)->with('platform')->get();
        $problemAds = AdCampaign::whereHas('adAccount', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('status', 'problem')
        ->get();
        return view('client.ad.platforms', compact('user', 'platforms', 'adAccounts', 'problemAds'));
    }

    /**
     * Menampilkan halaman review iklan.
     */
    public function showAdReview()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $adAccounts = AdAccount::where('user_id', $user->id)->with('platform')->get();
        $problemAds = AdCampaign::whereHas('adAccount', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('status', 'problem')
        ->get();
        $adReviews = [];
        return view('client.ad.review', compact('user', 'adAccounts', 'problemAds', 'adReviews'));
    }
    
    /**
     * Menampilkan halaman saldo saya.
     */
    public function showAdBalance()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $adAccounts = AdAccount::where('user_id', $user->id)->with('platform')->get();
        $problemAds = AdCampaign::whereHas('adAccount', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('status', 'problem')
        ->get();
        $adBalances = [];
        return view('client.ad.balance', compact('user', 'adAccounts', 'problemAds', 'adBalances'));
    }
    
    /**
     * Menampilkan halaman iklan bermasalah.
     */
    public function showProblemAds()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $adAccounts = AdAccount::where('user_id', $user->id)->with('platform')->get();
        // Mengambil semua iklan bermasalah untuk ditampilkan di halaman utama konten
        $problemAds = AdCampaign::whereHas('adAccount', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('status', 'problem')
        ->get();
        
        return view('client.ad.problem', compact('user', 'adAccounts', 'problemAds'));
    }
}
