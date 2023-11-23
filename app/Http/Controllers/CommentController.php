<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->article_id = $request->article_id;
        $comment->commentaire = $request->commentaire;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article ,Comment $comment)
    {
        // dd($comment->id);
        $comments = $article->comments()->with('user')->where('id','!=',$comment->id)->distinct()->get();
        
        return view('articles.updateComment', [
            'article' => $article,
            'comments' => $comments,
            'commentSp' => $comment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = $request->article_id;

        $comment = Comment::findOrFail($id);

        $comment->commentaire = $request->commentaire;
        $comment->save();
        return redirect()->route('detail', ['id' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        // if (!Gate::allows('delete-comment',$comment)) {
        //     return back();
        // };
        $comment->delete();
        return back();
        // return redirect()->route('article.show', ['article' => $article]);

        
    }
}
