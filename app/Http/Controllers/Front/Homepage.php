<?php

namespace App\Http\Controllers\Front;


use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Category;

class Homepage extends Controller
{
    public function index() {
      $data['articles'] = Article::orderBy('created_at', 'DESC')->get();
      $data['categories'] = Category::inRandomOrder()->get();
      return view('front.homepage', $data);
    }
}
