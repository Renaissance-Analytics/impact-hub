<?php
// Migration files for this model: 
// @2023_12_20_204625_create_sections_table.php 
// @2023_12_21_042114_add_order_to_sections.php 
// @2023_12_22_230620_add_bgcolor_to_section.php 
// @2023_12_24_222640_change_sections_cta_link_to_sections.php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\Concerns\HasUlids;

class CmsSection extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'layout',
        'cms_page_id',
        'order',
        'bgcolor',
        'cta_link',
        'cta_text',
        'title',
        'content',
        'image',
        
    ];

    protected $appends = ['url_safe_name','url_safe_cta_link'];
    

    public function getUrlSafeNameAttribute()
    {
        return strtolower(str_replace(' ', '-', trim($this->name)));
    }

    public function getUrlSafeCtaLinkAttribute()
    {
        $section = CmsSection::where('id', $this->cta_link)->first();
        return $section ? strtolower(str_replace(' ', '-', trim($section->name))) : null;
    }

    public function cms_page(): BelongsTo
    {
        return $this->belongsTo(CmsPage::class);
    }

    

    public function linkedSection(): BelongsTo
    {
        return $this->belongsTo(CmsSection::class, 'cta_link');
    }
}
