<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\String\Slugger\AsciiSlugger;

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
        $input = $request->input();

        $validator = Validator::make($input, [
            'nom' => 'required',
            'categorie' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();  
            $this->validate($request, [
                'nom' => 'required',
                'categorie' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required',
                'status' => 'required',
                'date' => 'required',
            ]);

            // $image = $request->file('photo');
            // $name = ($request->nom).'.'.$image->getClientOriginalExtension();
            // $destinationPath = public_path('/images');
            // $image->move($destinationPath, $name);

            $article = new Article([
                'nom' => $request->nom,
                'categorie' => $request->categorie,
                'photo' => $request,
                'description' => $request->description,
                'status' => $request->status,
                'date' => $request->date,
            ]);
            $article->save();

            return redirect()->route('articles.index')->with('success','Article a été créé avec succès');
        } else{

        }
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
            'date' => 'required',
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = ($request->nom).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $article->photo = $name;
        }

        $article->nom = $request->nom;
        $article->categorie = $request->categorie;
        $article->description = $request->description;
        $article->status = $request->status;
        $article->date = $request->date;
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