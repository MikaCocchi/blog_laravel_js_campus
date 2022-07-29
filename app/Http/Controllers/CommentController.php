<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'content' => 'required|max:2000',
            'email' => 'nullable|email',
            'pseudo' =>'nullable|max:55',
            'article_id' => 'required|integer',
        ]);
        $comment = new Comment;
        if (isset($request->email)) {
            $comment->email = $validate['email'];
            $comment->pseudo = $validate['pseudo'];
        } else {
            $comment->user_id = Auth::user()->id;
        }
        $article_id = $validate['article_id'];
        $comment->content = $validate['content'];
        $comment->article_id = $article_id;
        $comment->save();
        return redirect("/articles/$article_id")->with('status', 'comment has Been inserted');
    }
}
