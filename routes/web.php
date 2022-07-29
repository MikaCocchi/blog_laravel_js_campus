<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\Dashboard_articleController;
use App\Http\Controllers\Dashboard_articlesController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard/articles/create', [Dashboard_articleController::class, 'index'])->name('dashboard_article');

Route::delete('/dashboard/articles/{article}/delete',[Dashboard_articleController::class, 'delete'])->name('dashboard_article_delete');
require __DIR__.'/auth.php';
