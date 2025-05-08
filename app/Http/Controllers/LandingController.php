<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Author;

class LandingController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $featureds = News::where('is_featured', true)->get();
        $news = News::orderBy('created_at', 'desc')->get()->take(4);
        $authors =Author::all();
        return view('pages.landing', compact('banners', 'featureds', 'news', 'authors')); 
    }
}