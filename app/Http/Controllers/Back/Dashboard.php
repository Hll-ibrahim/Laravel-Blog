<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Page;
use App\Models\Category;

class Dashboard extends Controller
{
    public function index() {
        $articles=Article::all()->count();
        $categories=Category::all()->count();
        $pages=Page::all()->count();
        $hit=Article::sum('hit');
        return view('back.dashboard', compact('articles','pages','categories','hit'));
    }
}
