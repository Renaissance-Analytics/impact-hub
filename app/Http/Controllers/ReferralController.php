<?php

namespace App\Http\Controllers;

use App\Models\ReferralCode;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index(ReferralCode $referralCode)
    {
        $referralCode->increment('visits');

        return view('invite.index', [
            'referralCode' => $referralCode
        ]);
    }

    public function store(ReferralCode $referralCode)
    {
        $referralCode->increment('clicks');

        cookie()->queue(
            cookie('referral_code', $referralCode->code, now()->addMonth()->diffInMinutes())
        );

        return redirect()->route('register');
    }

    public function more(ReferralCode $referralCode)
    {
        $referralCode->increment('more');

        cookie()->queue(
            cookie('referral_code', $referralCode->code, now()->addMonth()->diffInMinutes())
        );

        return redirect()->route('home');
    }
}
