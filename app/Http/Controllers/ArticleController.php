<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('article',['article' => $article,'comments' => $comments]);
    }
}
