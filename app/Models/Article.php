<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
