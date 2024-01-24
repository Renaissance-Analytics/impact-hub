<?php
// Migration file for this model: 2023_12_20_204612_create_cms_pages_table.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use App\Models\User;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Concerns\HasUlids;


class CmsPage extends Model
{
    use HasFactory, HasUlids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'author',
        'slug',
        'published',
        'published_at',
    ];

    protected $casts = [
        'published' => 'boolean', // or 'int
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        // static::created(function ($cmsPage) {
        //     Section::create([
        //         'name' => 'Main',
        //         'layout' => 'main', // or any default layout you want to set
        //         'cms_page_id' => $cmsPage->id,
        //         // add other necessary fields here
        //     ]);
        // });
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}