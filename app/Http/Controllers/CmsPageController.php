<?php

namespace App\Http\Controllers;

use App\Models\CmsPage;
use Illuminate\Http\Request;

class CmsPageController extends Controller
{
    public function show($slug)
    {
        
        $page = CmsPage::where('slug', $slug)->with('sections')->firstOrFail();

        

        return view('components.layouts.cms', compact('page'));
    }
}
