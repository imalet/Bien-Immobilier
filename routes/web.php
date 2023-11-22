<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



ROUTE::get('/ajoutArticle', function(){
    return view('articles.create');
});

Route::post('/articles/create', [ArticleController::class, 'store'])->name('enregistre');

Route::resource('articles/', ArticleController::class);

Route::get('/articles.create', function () {
    return view('show');
});
//nouvel article
// Route::get('/new','create')->name('create');
// Route::post('/new','store');

//editer(modifier) un article
// Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('articles.edit');
// Route::put('/articles/{article}', 'ArticleController@update')->name('articles.update');
//delete(supprimer) un article
// Route::delete('/articles/{article}', 'ArticleController@destroy')->name('articles.destroy');
//Affichage des articles
Route::get('/articles/index', [ArticleController::class,'index'])->name('articles.index');
//details de l'article
Route::get('/articles/{id}',[ArticleController::class,'show'])->name('detail');
//update detail
Route::get('/articles/{id}/edit',[ArticleController::class,'edit'])->name('edit');
Route::post('/articles/{id}/update',[ArticleController::class,'update'])->name('update');
//delete article
Route::get('/articles/{id}/delete',[ArticleController::class,'destroy'])->name('delete');
