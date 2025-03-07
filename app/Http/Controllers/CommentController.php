<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Film;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Film $film)
    {
        $request->validate([
            'body'=> 'required|string|max:500',
        ]);

        $film->comments()->create([
            'body' => $request->input('body'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Your comment has been posted!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth()->id()) 
        {
            abort(403, 'Вы не можете удалить этот комментарий');
        }

        $comment->delete();

        return back()->with('success', 'Комментарий удален!');
    }
}
