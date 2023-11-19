<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'categorie' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'status' => 'required',
            'date_a_quoi' => 'required',
        ]);

        $image = $request->file('photo');
        $name = str_slug($request->nom).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        $article = new Article([
            'nom' => $request->nom,
            'categorie' => $request->categorie,
            'photo' => $name,
            'description' => $request->description,
            'status' => $request->status,
            'date_a_quoi' => $request->date_a_quoi,
        ]);
        $article->save();

        return redirect()->route('articles.index')->with('success','Article a été créé avec succès');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            'categorie' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'status' => 'required',
            'date_a_quoi' => 'required',
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = str_slug($request->nom).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $article->photo = $name;
        }

        $article->nom = $request->nom;
        $article->categorie = $request->categorie;
        $article->description = $request->description;
        $article->status = $request->status;
        $article->date_a_quoi = $request->date_a_quoi;
        $article->save();

        return redirect()->route('articles.index')->with('success','Article a été mis à jour avec succès');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success','Article a été supprimé avec succès');
    }
}