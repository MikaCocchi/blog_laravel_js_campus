<?php

namespace App\Http\Controllers;

use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::withCount('comments')->latest()->paginate(10);
        return view('welcome',['articles' => $articles]);
    }
}
