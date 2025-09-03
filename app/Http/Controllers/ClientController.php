<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdAccount;
use App\Models\AdCampaign;
use App\Models\AdPlatform;
use App\Models\AdReview;
use App\Models\Iklan;
use Illuminate\Support\Facades\Storage;

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
        
        $iklans = Iklan::where('aktif', true)->get();

        return view('client.dashboard', compact('user', 'adAccounts', 'problemAds', 'iklans'));
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
        
        $adReviews = AdReview::where('user_id', $user->id)
            ->with(['adAccount.platform'])
            ->latest()
            ->get();

        return view('client.ad.review', compact('user', 'adAccounts', 'adReviews'));
    }
    
    /**
     * Mengajukan review iklan baru.
     */
    public function storeAdReview(Request $request)
    {
        $request->validate([
            'ad_account_id' => 'required|exists:ad_accounts,id',
            'campaign_name' => 'required|string|max:255',
            'creative_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'creative_text' => 'nullable|string',
        ]);

        $user = Auth::user();
        $imagePath = $request->file('creative_image')->store('ad_reviews', 'public');

        AdReview::create([
            'user_id' => $user->id,
            'ad_account_id' => $request->ad_account_id,
            'campaign_name' => $request->campaign_name,
            'creative_image' => basename($imagePath),
            'creative_text' => $request->creative_text,
            'status' => 'pending',
        ]);

        return redirect()->route('ads.review')->with('success', 'Review iklan berhasil diajukan!');
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
        $problemAds = AdCampaign::whereHas('adAccount', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('status', 'problem')
        ->get();
        
        return view('client.ad.problem', compact('user', 'adAccounts', 'problemAds'));
    }
}
