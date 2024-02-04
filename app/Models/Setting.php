<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Setting extends Model
{
    use HasFactory, HasUlids;

    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Cache for all settings.
     *
     * @var \Illuminate\Support\Collection|null
     */
    protected static $cache = null;

    /**
     * Magic method to retrieve settings by key.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        // Convert camelCase to snake_case
        $snakeKey = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

        // Try to get the setting from the cache
        $setting = Cache::remember('settings.' . $snakeKey, 60, function () use ($snakeKey) {
            return self::where('key', $snakeKey)->first();
        });

        if (!$setting) {
            // If the setting does not exist, defer to the parent method
            return parent::__get($key);
        }

        // Return the Setting model instance directly
        return $setting;
    }

    /**
     * Magic method to set settings by key.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    // public function __set($key, $value)
    // {
    //     // Convert camelCase to snake_case
    //     $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));

    //     // Fetch the setting from the database
    //     $setting = self::where('key', $key)->first();

    //     // If the setting exists, update its value
    //     if ($setting) {
    //         $setting->value = $value;
    //         $setting->save();
    //     } else {
    //         // If the setting does not exist, create a new one
    //         self::create([
    //             'key' => $key,
    //             'value' => $value,
    //         ]);
    //         // Save the setting to trigger the saved event
    //         $setting->save();
    //     }
    // }

    /**
     * Boot the model.
     */
    protected static function booted()
    {
        static::saved(function ($settings) {
            if (auth()->check() && auth()->user()->isAdmin) {
                $userId = auth()->id();
                \App\Models\SettingAudit::create([
                    'key' => $settings->key,
                    'value' => $settings->value,
                    'user_id' => $userId,
                ]);
                Cache::forget('settings.' . $settings->key);
            }
        });
    }

    /**
     * Get the history of a setting based on the 'key' column.
     *
     * @param string $key
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auditTrail($key)
    {
        return $this->hasMany(SettingAudit::class)->where('key', $key);
    }
}
