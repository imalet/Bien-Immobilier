<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Mail;
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
                'dimension' => 'required',
                'balcon' => 'required',
                'espaceVert' => 'required',
                'toilette' => 'required'

            ]
        );
        $article = new Article($validator);
        $article->nom = $request->nom;
        $article->categorie = $request->categorie;
        $article->Dimension = $request->dimension;
        $article->description = $request->description;
        $article->nombreChambre = $request->nombreChambres;
        $article->nombreBalcon = $request->balcon;
        $article->nombreEspaceVert = $request->espaceVert;
        $article->status = $request->status;
        $article->date = $request->date;
        $article->user_id = Auth::user()->id;
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

        // return back()->with('success','Article a été créé avec succès');


        // dd($request);
        $imagesChambres = [];
        $dimensionsChambres = [];
        $libellesChambres = [];

        for ($i = 1; $i <= $request->nombreChambres; $i++) {

            $imageChambre = $request->file("imageChambre$i");
            $dimensionChambre = $request->input("dimensionChambre$i");
            $libelleChambre = $request->input("libelleChambre$i");

            // dd($imageChambre);

            $imageChambreName = time() . "_chambre_$i." . $imageChambre->getClientOriginalExtension();

            $imagePath = public_path('images');
            $imageChambre->move($imagePath, $imageChambreName);

            $imagesChambres[] = 'images/' . $imageChambreName;
            $dimensionsChambres[] = $dimensionChambre;
            $libellesChambres[] = $libelleChambre;
        }

        // $article->photoChambre = json_encode($imagesChambres);
        // $article->DimensionChambre = json_encode($dimensionsChambres);

        $article->saveChambres($imagesChambres, $dimensionsChambres, $libellesChambres);

        $article->save();

        $emailUsers = User::all();

        foreach ($emailUsers as $emailUser) {
            Mail::to($emailUser->email)->send(new Email());
        }

        return redirect()->route('articles.index')->with('success', 'Article a été créé avec succès');
    }
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->with('user')->distinct()->get();
        return view('articles.show', compact('article', 'comments'));
    }


    public function showarticle($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments()->with('user')->distinct()->get();
        return view('articles.showarticle', compact('article', 'comments'));
    }




    public function edit($id)
    {
        $article = Article::findOrFail($id);

        if ($article->user_id === Auth::user()->id) {
            return view('articles.edit', compact('article'));
        }
        return back();
        
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
            $name = ($request->nom) . '.' . $image->getClientOriginalExtension();
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
        $article = Article::findOrFail($id);

        if ($article->id !== Auth::user()->id) {
            return back();
        }
        // Vérification si l'article existe
        $article = Article::findOrFail($id);

        // Suppression de l'article
        $article->delete();

        // Redirection vers la page d'index des articles
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès');
    }
}
