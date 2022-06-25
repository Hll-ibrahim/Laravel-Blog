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

    public function single($category, $slug) {

      $category = Category::whereSlug($category)->first() ?? abort(403, "Böyle bir kategori bulunamadı.");
      $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403, 'Böyle bir makale bulunamadı.');
      $article->increment('hit');
      $data['article'] = $article;
      $data['categories'] = Category::inRandomOrder()->get();
      return view('front.single', $data);
    }

    public function category($slug) {
      $category = Category::whereSlug($slug)->first() ?? abort(403, "Böyle bir kategori bulunamadı.");
      $data['category'] = $category;
      $data['articles'] = Article::where('category_id', $category->id)->orderBy('created_at', 'DESC')->get();
      $data['categories'] = Category::inRandomOrder()->get();
      return view('front.category', $data);
    }
}
