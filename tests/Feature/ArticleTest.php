<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleTest extends TestCase
{
    public function testAjouterArticle()
    {
        // Supposons que vous avez déjà un utilisateur authentifié
        $user = User::factory()->create();
        $this->actingAs($user);
        // Créer une instance de la classe Request avec les données simulées
        $image = UploadedFile::fake()->image('test.png');
        $photoChambre = UploadedFile::fake()->image('test.png');

        $requestData = [
            'nom' => 'essai',
            'categorie' => 'test',
            'description' => 'test',
            'status' => 'Disponible',
            'date' => '2022-01-01',
            'dimension' => 'test',
            'espaceVert' => 2,
            'toilette' => 5,
            'nombreChambre' => 1,
            'balcon' => 5,
            'photo' => $image,
            'photoChambre' => $photoChambre,
            'DimensionChambre' => '2m',
            'LibelleChambre' => 'Chambre Principale',
        ];

        $response = $this->post(route('enregistre'), $requestData);

        $response->assertRedirect(route('articles.index'));

        $this->assertDatabaseHas('articles', [
            'nom' => 'essai',
        ]);

        // Assurez-vous que le fichier image a été stocké dans le bon répertoire
        $this->assertFileExists(public_path('images/' . time() . '.' . $image->getClientOriginalExtension()));
    }


    public function testListerArticles()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        // Créer des articles fictifs dans la base de données
        Article::factory()->create(['user_id' => $user->id]);

        // Effectuer une requête GET vers la route associée à la méthode 'index'
        $response = $this->get(route('articles.index'));

        // Vérifier que la réponse a un code HTTP 200 (OK)
        $response->assertStatus(200);

        // Vérifier que la vue 'articles.index' est renvoyée
        $response->assertViewIs('articles.index');
    }

    public function testDestroyArticle()
    {
        // Crée un utilisateur
        $user = User::factory()->create();

        // Crée un article lié a cet l'utilisateur
        $article = Article::factory()->create(['user_id' => $user->id]);

        // Simule l'authentification de l'utilisateur
        $this->actingAs($user);

        // // Appelle la méthode destroy avec l'ID de l'article créé
        $response = $this->get("/articles/{$article->id}/delete");

        // s'assurer que l'article a été supprimé de la base de données
        $this->assertDatabaseMissing('articles', ['id' => $article->id]);


        // s'assurer que la redirection a été effectuée vers la page d'index des articles
        $response->assertRedirect();
    }
}
