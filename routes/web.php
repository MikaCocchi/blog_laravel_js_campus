<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashboard_articleController;
use App\Http\Controllers\Dashboard_articlesController;
use App\Http\Controllers\Dashboard_CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/articles', [HomeController::class, 'index'])->name('articles');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article');

Route::post('/articles/{article}/add_comment',[CommentController::class, 'store'])->name('add_comment');



Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/articles', [Dashboard_articlesController::class, 'index'])->name('dashboard_articles');

Route::post('/dashboard/articles/add',[Dashboard_articleController::class, 'store'])->name('dashboard_add_article');

Route::get('/dashboard/articles/{article}', [Dashboard_articleController::class, 'show'])->name('dashboard_article');

Route::put('/dashboard/articles/{article}', [Dashboard_articleController::class, 'update'])->name('dashboard_article.update');


Route::delete('/dashboard/articles/{article}/delete',[Dashboard_articleController::class, 'destroy'])->name('dashboard_article.destroy');

Route::delete('/dashboard/articles/delete/{comment}',[Dashboard_CommentController::class, 'destroy'])->name('dashboard_comment.destroy');

Route::put('/dashboard/articles/modify/{comment}',[Dashboard_CommentController::class, 'update'])->name('dashboard_comment.update');
require __DIR__.'/auth.php';
