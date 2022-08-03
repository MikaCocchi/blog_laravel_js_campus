<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $articles = Article::withCount('comments')->latest()->paginate(10);
        return response()->json($articles);
    }


    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Article $article)
    {
        $article->loadCount('comments')->load('comments.user' , 'user');
        return response()->json($article) ;
    }


}
