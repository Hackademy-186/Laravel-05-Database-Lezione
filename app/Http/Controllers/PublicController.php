<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage()
    {
        return view('welcome');
    }

    public function userDashboard(){
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }

    public function userDelete(){
        //dissociate???????????

        //Dall'utente mi recupero tutti gli articoli a lui collegati e li ciclo uno per uno
        foreach(Auth::user()->articles as $article){
            //prendo il singolo articolo e prendo l'utente collegato, una volta recuperato l'utente lo distacco dall'articolo (in pratica metto null nel campo della tabella user_id)
            //questa operazione però rimane solo a livello di preparazione, si chiama operazione intermedia
            $article->user()->dissociate();
            //devo effettivamente fare la modifica nel databe e la compio utilizzando il emtodo save
            $article->save();
        }

        Auth::user()->delete();
        return redirect(route('homepage'))->with('successMessage','Utente eliminato con successo!');
    }
}
