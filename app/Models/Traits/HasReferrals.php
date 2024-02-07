<?php

namespace App\Models\Traits;

use App\Models\ReferralCode;

trait HasReferrals
{
    public function referralsEnabled(): bool
    {
        return $this->hasReferralCode()
            && !is_null($this->email_verified_at);
    }

    public function hasReferralCode(): bool
    {
        return $this->referralCode()->exists();
    }

    public function referralLink(): string
    {
        return route('invite.index', $this->referralCode);
    }

    public function referralCode()
    {
        return $this->hasOne(ReferralCode::class);
    }
}
