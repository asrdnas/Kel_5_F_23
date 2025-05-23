<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail(); // gunakan firstOrFail untuk mencegah null

        $newests = News::where('id', '!=', $news->id) // pengecualian berita yang sedang ditampilkan
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.news.show', compact('news', 'newests'));
    }


    public function category($slug)
    {
        $category = NewsCategory::where('slug', $slug)->first();
        return view('pages.news.category', compact('category'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = News::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return view('pages.search', compact('results', 'query'));
    }
}
