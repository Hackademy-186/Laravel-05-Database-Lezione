<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//*Rotte per la gestione dell'utente
Route::get('/user/dashboard', [PublicController::class, 'userDashboard'])->name('user.dashboard');
Route::delete('/user/delete', [PublicController::class, 'userDelete'])->name('user.delete');

//* Mostra il form degli articoli agli utenti
Route::get('/nuovo-articolo', [ArticleController::class, 'create'])->name('article.create');

//* Gestisce il salvataggio nel db
Route::post('/salva-articolo', [ArticleController::class, 'store'])->name('article.store');

//* Mostra la pagina con tutti gli articoli
Route::get('/tutti-gli-articoli', [ArticleController::class, 'index'])->name('article.index');

//* Rotta che mostra il dettaglio dell'articolo
Route::get('/dettaglio-articolo/{article}', [ArticleController::class, 'show'])->name('article.show');

//* Rotta che mostra il form per la modifica dell'articolo
Route::get('/modifica-articolo/{article}', [ArticleController::class, 'edit'])->name('article.edit');

//* Rotta che andrà a modificare effettivamente l'articolo
Route::put('/aggiorna-articolo/{article}', [ArticleController::class, 'update'])->name('article.update');

//* Rotta che andrà a cancellare l'articolo
Route::delete('cancella-articolo/{article}' , [ArticleController::class, 'destroy'])->name('article.delete');
