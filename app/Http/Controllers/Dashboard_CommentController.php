<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class Dashboard_CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('status', 'Comment has Been deleted');
    }

    public function update(Request $request, Comment $comment)
    {
        $validate = $request->validate([
            'content' => 'max:2000',
        ]);
        $comment->content = $validate['content'];
        $comment->save();
        return redirect()->back()->with('status', 'Article has Been modified');
    }
}
