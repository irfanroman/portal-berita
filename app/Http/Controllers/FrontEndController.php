<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {

        $nav_category = Category::all();
        $title = "Welcome to Zenn Blog";
        $news = News::latest()->get();
        $slider = Slider::all();
        $side_news = News::inRandomOrder()->limit(4)->get();

        return view('frontend.index', compact('news', 'nav_category', 'side_news', 'title', 'slider'));
    }


    public function detailCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $text = Category::findOrFail($category->id)->name;
        $title = "p - $text";
        $news     = News::where('category_id', $category->id)->paginate(10);
        $category_name = Category::all();
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit(4)->get();

        return view('frontend.detail-category', compact('news', 'category_name', 'nav_category', 'side_news', 'title'));
    }

    public function detailNews($slug)
    {
        $news = News::where('slug', $slug)->first();
        $text = News::findOrFail($news->id)->title;
        $title = "Berita - $text";
        $nav_category = Category::all();
        $side_news = News::inRandomOrder()->limit(4)->get();


        return view('frontend.detail-news', compact('news', 'nav_category', 'side_news', 'title' ));
    }


    public function searchNewsEnd(Request $request)
    {
        $keyword = $request->keyword;
        $news = News::where('title', 'like', '%' . $keyword . '%')->paginate(10);
        $slider = Slider::all();
        $nav_category = Category::all();
        $title = "Welcome to Zenn Blog";
        $side_news = News::inRandomOrder()->limit(4)->get();

        return view('frontend.index', compact('news', 'slider', 'nav_category', 'title', 'side_news'));
    }
}
