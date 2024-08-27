<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DailayController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

/* Route::middleware(['auth'])->group(function () {
    //posts
    Route::middleware(['can:view,article'])->get('Article/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::middleware(['can:create,App\Models\Article'])->get('article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::middleware(['can:create,App\Models\Article'])->post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::middleware(['can:update,Article'])->get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::middleware(['can:update,Article'])->put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::middleware(['can:delete,post'])->delete('posts/{post}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    //logout
    Route::post('logout', [UserController::class, 'logout'])->name('logout');


    //category
    Route::middleware(['can:viewAny,App\Models\Category'])->get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::middleware(['can:view,category'])->get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::middleware(['can:create,App\Models\Category'])->get('category/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::middleware(['can:create,App\Models\Category'])->post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::middleware(['can:update,category'])->get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::middleware(['can:update,category'])->put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

    Route::middleware(['can:delete,category'])->delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

     //tag
    
    Route::middleware(['can:view,dailay'])->get('dailays/{dailay}', [DailayController::class, 'show'])->name('daily.show');
    Route::middleware(['can:create,App\Models\Dailay'])->get('dailay/dailay', [DailayController::class, 'create'])->name('daily.create');
    Route::middleware(['can:create,App\Models\Dailay'])->post('dailays', [DailayController::class, 'store'])->name('daily.store');
    Route::middleware(['can:update,dailay'])->get('dailays/{dailay}/edit', [DailayController::class, 'edit'])->name('daily.edit');
    Route::middleware(['can:update,dailay'])->put('dailays/{dailay}', [DailayController::class, 'update'])->name('daily.update');
    Route::middleware(['can:delete,dailay'])->delete('dailays/{dailay}', [CategoryController::class, 'destroy'])->name('daily.destroy');

});


Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/homr', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('dailay', [DailayController::class, 'index'])->name('daily.index');
}); */
    Route::get('', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('login', [UserController::class, 'login']);
    
   
    Route::middleware(['can:view,post'])->get('Article/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::middleware(['can:create,App\Models\Article'])->get('article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::middleware(['can:create,App\Models\Article'])->post('articles', [ArticleController::class, 'store'])->name('articles.store');
    Route::middleware(['can:update,article'])->get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::middleware(['can:update,article'])->put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::middleware(['can:delete,article'])->delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

    //logout
    Route::post('logout',[UserController::class,'logout'])->name('logout');


    //category
    Route::middleware(['can:viewAny,App\Models\Category'])->get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::middleware(['can:view,category'])->get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::middleware(['can:create,App\Models\Category'])->get('category/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::middleware(['can:create,App\Models\Category'])->post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::middleware(['can:update,category'])->get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::middleware(['can:update,category'])->put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

    Route::middleware(['can:delete,category'])->delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

     //daily
    
    Route::middleware(['can:view,dailay'])->get('dailays/{dailay}', [DailayController::class, 'show'])->name('daily.show');
    Route::middleware(['can:create,App\Models\Dailay'])->get('dailay/dailay', [DailayController::class, 'create'])->name('daily.create');
    Route::middleware(['can:create,App\Models\Dailay'])->post('dailays', [DailayController::class, 'store'])->name('daily.store');
    Route::middleware(['can:update,dailay'])->get('dailays/{dailay}/edit', [DailayController::class, 'edit'])->name('daily.edit');
    Route::middleware(['can:update,dailay'])->put('dailays/{dailay}', [DailayController::class, 'update'])->name('daily.update');
    Route::middleware(['can:delete,dailay'])->delete('dailays/{dailay}', [DailayController::class, 'destroy'])->name('daily.destroy');
    Route::get('dailay', [DailayController::class, 'index'])->name('daily.index');
    Route::get('search',[ArticleController::class , 'searcharticle'])->name('articles.search');