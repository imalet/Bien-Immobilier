<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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



ROUTE::get('/ajoutArticle', function () {
    return view('articles.create');
});

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::post('/articles/create', [ArticleController::class, 'store'])->name('enregistre');
Route::resource('articles/', ArticleController::class);

Route::get('/articles.create', function () {
    return view('show');
});


//Affichage des articles
Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
//details de l'article
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('detail');
//update detail
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('edit');

Route::post('/articles/{id}/update', [ArticleController::class, 'update'])->name('update');
//delete article
Route::get('/articles/{id}/delete', [ArticleController::class, 'destroy'])->name('delete');

// Add Comment
Route::post('/addComment',[CommentController::class, 'store'])->middleware('auth')->name('comment.add');
// Edit Comment
Route::get('/artilcle/edit-comment/{article}/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
// Update Comment
Route::post('/artilcle/update-comment/{id}', [CommentController::class, 'update'])->name('comment.update');
// Delete
Route::get('/comment/comment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

// Deconnexion
Route::get('/deconnexion',function(){

    Auth::logout();
    return back();
})->name('deconnexion');