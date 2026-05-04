<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[Fillable(['title', 'subtitle', 'body', 'cover', 'user_id'])]
class Article extends Model
{
    // protected $fillable = [
    //     'title',
    //     'subtitle',
    //     'body'
    // ];

    //questo metodo sta descrivendo sempre la relazione 1-N
    //questa funzione deve restituire il risultato di una belongs to
    //Il nome del metodo deve essere al singolare
    public function user(): BelongsTo
    {
        //questa funzione restituisce il singolo oggetto utente collegato all'articolo che sto manipolando
        return $this->belongsTo(User::class);
    }

    //questa funzione deve possedere il nome al plurale del modello singolare di riferimento
    //deve restituire il risultato di una belongs to many
    public function tags(): BelongsToMany
    {
        //questa funzione restituisce una collection di tutti gli oggetti Tag collegati al singolo articolo (cioè tutti i tag dell'articolo)
        //Una colelction collegata ad un model ESISTE SEMPRE nel sistema e non è mai null
        return $this->belongsToMany(Tag::class);
    }
}
