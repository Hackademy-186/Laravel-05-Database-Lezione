<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['name'])]
class Tag extends Model
{
    //questa funzione deve possedere il nome al plurale del modello singolare di riferimento
    //deve restituire il risultato di una belongs to many
    public function articles(): BelongsToMany
    {
        //questa funzione restituisce una collection di tutti gli oggetti Article collegati al singolo tag (cioè tutti gli articoli con quel tag specifico)
        return $this->belongsToMany(Article::class);
    }
}
