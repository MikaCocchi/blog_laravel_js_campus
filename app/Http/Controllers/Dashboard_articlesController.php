<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class Dashboard_articlesController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $articles = Article::withCount('comments')->latest()->paginate(10);
        return view('dashboard_articles',['articles' => $articles]);
    }
}
