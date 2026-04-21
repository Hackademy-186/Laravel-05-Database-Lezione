<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//* Mostra il form degli articoli agli utenti
Route::get('/nuovo-articolo', [ArticleController::class, 'create'])->name('article.create');

//* Gestisce il salvataggio nel db
Route::post('/salva-articolo', [ArticleController::class, 'store'])->name('article.store');

//* Mostra la pagina con tutti gli articoli
Route::get('/tutti-gli-articoli', [ArticleController::class, 'index'])->name('article.index');
