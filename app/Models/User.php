<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Traits\HasReferrals;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use LevelUp\Experience\Concerns\GiveExperience;
use LevelUp\Experience\Concerns\HasAchievements;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasUlids;
    use GiveExperience;
    use HasAchievements;
    use MustVerifyEmail;
    use HasReferrals;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'display_name',
        'company_name',
        'tester',
        'type',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'tester' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin(): bool
    {

        return ($this->role === 'admin' || $this->role === 'supmin');
    }


    /**
     * REFERRAL CODE LOGIC:
     * The trait HasReferrals provides methods for managing a user's referral code. We no longer need your methods for managing the referral code in the User model.
     * You can find the trait in app/Models/Traits/HasReferrals.php or at the end of this file in the use HasReferrals;
     * We do not need the referral code to be in the users table as we now handle this in the referral_codes table.
     */
}
