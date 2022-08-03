<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard_articleController extends Controller
{
    public function destroy(Article $article)
    {
        $article->comments()->delete();
        $article->delete();
        return redirect()->back()->with('message', 'Article has Been deleted');
    }

    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('dashboard_article', ['article' => $article, 'comments' => $comments]);
    }

    public function update(Request $request, Article $article)
    {
        $validate = $request->validate([
            'title' => 'max:500',
            'content' => 'max:2000',
        ]);
        $article->title = $validate['title'];
        $article->content = $validate['content'];
        $article->save();
        return redirect()->back()->with('status', 'Article has Been modified');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|max:500',
            'content' => 'required|max:2000',
        ]);
        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->title = $validate['title'];
        $article->content = $validate['content'];
        $article->save();
        return redirect()->back()->with('status', 'Article has Been inserted');
    }
}
