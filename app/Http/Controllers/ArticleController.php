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
        // dd($request);
        // $input = $request->input();
        $validator = $request->validate(
            [
                    'nom' => 'required',
                    'categorie' => 'required',
                    // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'description' => 'required',
                    'status' => 'required',
                    'date' => 'required',
            ]
        );
        $article = new Article($validator);
        $article->nom = $request->nom;   
        $article->categorie = $request->categorie;   
        // $article->photo = $request->photo;              
        $article->description = $request->description;   
        $article->status = $request->status;   
        $article->date = $request->date;  
        // Récupérer le fichier image à partir de la requête
        $image = $request->photo;
        // dd($image);

        // Générer un nom unique pour le fichier image
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        // Définir le chemin où le fichier image sera stocké (assurez-vous d'avoir le répertoire 'images' créé dans le dossier public de votre application)
        $imagePath = public_path('images');

        // Déplacer le fichier image vers le répertoire défini
        $image->move($imagePath, $imageName);

        // Stocker le chemin du fichier image dans le modèle
        $article->photo = 'images/' . $imageName;
 
        // dd($article);
        $article->save();
        // return back()->with('success','Article a été créé avec succès');
        return redirect()->route('articles.index')->with('success','Article a été créé avec succès');

        // $validator = Validator::make( [
        //     'nom' => 'required',
        //     'categorie' => 'required',
        //     'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'description' => 'required',
        //     'status' => 'required',
        //     'date' => 'required',
        // ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();  
    //         $this->validate($request, [
    //             'nom' => 'required',
    //             'categorie' => 'required',
    //             'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //             'description' => 'required',
    //             'status' => 'required',
    //             'date' => 'required',
    //         ]);

    //         // $image = $request->file('photo');
    //         // $name = ($request->nom).'.'.$image->getClientOriginalExtension();
    //         // $destinationPath = public_path('/images');
    //         // $image->move($destinationPath, $name);

    //     } else{
            // $article = new Article($validator);
               
            // $article->save();

            // return redirect()->route('articles.index')->with('success','Article a été créé avec succès');
    //     }
    }        
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->with('user')->distinct()->get();
        return view('articles.show', compact('article','comments'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {

        // dd($id);

        // $data = $request->validate([
        //     'nom' => 'required|string',
        //     'categorie' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'description' => 'required|string',
        //     'statut' => 'required|string',
        // ]);
    

        $article = Article::findOrFail($id);
        // dd($article);
    
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = ($request->nom).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $name);
            $article->photo = 'images/' . $name;
        }

        $article->nom = $request->nom;
        $article->categorie = $request->categorie;
        $article->description = $request->description;
        $article->status = $request->status;
        $article->date = $request->date;
        $article->save();
        // $article->update($data);

    return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès');
    }

   //Suppression
        
    public function destroy($id)
    {
        // Vérification si l'article existe
        $article = Article::findOrFail($id);

        // Suppression de l'article
        $article->delete();

        // Redirection vers la page d'index des articles
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}