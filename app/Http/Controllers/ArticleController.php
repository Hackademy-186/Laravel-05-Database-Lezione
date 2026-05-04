<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            //questo buttafuori controlla se un utente è autenticato(o ha fatto login o a ha fatto register)
            new Middleware('auth', except:['index', 'show']),
        ];
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

    // Creeremo N metodi che ci permetteranno di salvare, accedere, manipolare i nostri articoli

    //* Metodo per visualizzare pagina di un form che permettera' di inserire l'articolo
    public function create()
    {
        $tags = Tag::all(); //select * from tags
        return view('article.create', compact('tags'));
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
            'cover' => $request->file('cover')->store('covers', 'public'),
            'user_id' => Auth::user()->id
        ]);

        //dall'articolo recupera la sua collection tags e riempila con ciò che ti sto passando
        $article->tags()->attach($request->tags);

        //redirect verso una rotta di tipo get
        return redirect(route('homepage'))->with('successMessage','Articolo creato con successo');
    }

    public function show(Article $article){
        return view('article.show', compact('article'));
    }

    //questa rotta è collegata ad una rotta parametrica, il nome del parametro dichiarato nella rotta deve corrispondere esattamente al parametro del metodo ed il valore del dato che stiamo passando alla vista
    public function edit(Article $article){
        // return view('article.edit', ['article' => $article]);
        return view('article.edit', compact('article'));
    }

    //
    public function update(Request $request, Article $article){
        //dd($request->all(), $article);
        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            //l'utente ha selezionato una nuova immagine?
            //se si la modifchi
            //se no lasci quella che stava
            'cover' => $request->has('cover') ? $request->file('cover')->store('covers', 'public') : $article->cover
        ]);

        return redirect(route('homepage'))->with('successMessage','Articolo modificato con successo');
    }

    public function destroy(Article $article){
        
        //PRIMA SGANCIO L'INFORMAZIONE
        //Dall'articolo prendi la sacca con tutti i tag che sono all'interno ed tirali fuori uno per uno
        foreach($article->tags as $tag){
            //dal tag PERO' devi estrarre l'informazione di tutti gli articoli a cui è collegato
            //prendi poi l'informazione del collegamento che ha con l'articolo che voglio eliminare
            //e cancellala
            $tag->articles()->detach($article->id);
            //Però tutte l'operazione fatta prima avviene solo a livello di collection, dobbiamo 
            //necessariamente inserirla definitivamente nel database tramite il comando save()
            $tag->save();
        }

        //POI ELIMINO L'ARTICOLO
        $article->delete();

        return redirect(route('homepage'))->with('successMessage','Articolo cancellato con successo');
    }
}
