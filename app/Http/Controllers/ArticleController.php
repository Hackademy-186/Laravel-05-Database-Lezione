<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Creeremo N metodi che ci permetteranno di salvare, accedere, manipolare i nostri articoli

    //* Metodo per visualizzare pagina di un form che permettera' di inserire l'articolo
    public function create()
    {
        return view('article.create');
    }

    //* Metodo per salvare un articolo all'interno del database
    public function store(ArticleRequest $request)
    {
        //caro conttroller mostrami solo ed esclusivamente i dati che ti stanno arrivando dal form
        //dump e die
        // dd($request->all());

        // //! Creiamo una nuova istanza del modello
        // $article = new Article();

        // //! Valorizziamo i vari campi del modello
        // $article->title = $request->title;
        // $article->subtitle = $request->subtitle;
        // $article->body = $request->body;
        // $article->truffa = 'Ti ho fregato!';

        // //! Salva Article all'interno della tabella articles
        // $article->save();

        //mass assignment
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'cover' => $request->file('cover')->store('covers', 'public')
        ]);

        return redirect(route('homepage'))->with('successMessage','Articolo creato con successo');
    }

    //* Metodo per visualizzare tutti gli articoli
    public function index()
    {
        $articles = Article::all();

        // return view('article.index', compact('articles'));

        return view('article.index', [
            'articles' => $articles,
        ]);
    }
}
