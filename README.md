1. Andare sul Terminale, entrare in MySQL, creare un database
2. Laravel new e abbiamo aggiornato .env con i dati del database
3. Scaffolding (componenti, bundling degli asset, publicontroller)
4. Creato un Eloquent Model
5. Creato un controller specifico per quel modello
6. Abbiamo creato rotta/metodo/vista di un form di creazione
7. Abbiamo creato rotta/metodo/vista del salvataggio dei dati inseriti nel form
8. Abbiamo creato il file di migrazione per impostare la tabella relativa al Model
9. Abbiamo lanciato la migrazione con `php artisan migrate`
10. Abbiamo utilizzato il Protected Mass Assignment sul metodo di salvataggio Model::create([])
11. Abbiamo creato rotta/metodo/vista di visualizzazione di tutti gli articoli Model::all();


MIGRAZIONI
- La DESCRIZIONE di COME devono essere fatte le tabelle

NAME DEL FORM
- E' la chiave dell'array chiave valore che si forma nel momento in cui clicco sul tasto di tipo submit
- Senza l'array ed i suoi chiave valore non ho modo di cattura i dati inseriti negli input del form all'interno del controller

CARTELLA PUBLIC
- L'unica cartella che il browser ha il permesso di poter utilizzare del nostro progetto è la cartella public della root del progetto

VALIDAZIONE LATO SERVER
- Validazioni fatte nel controller

VALIDAZIONI LATO CLIENT
- Validazioni fatte con l'attributo required

COMPOSER REQUIRE
- installazione di una libreria php, quindi il nuovo progetto finirà all'interno della cartella vendor

VISTE DI FORTIFY
- Noi ci occupiamo di creare solo le viste per login e register perchè il logout non prevede che ci sia un form all'interno del quale devo inserire dati, ma è un semplice tasto che compie una azione


METODI HTTP
- GET -> prendo dal magazzino qualcosa che esiste (restituisce una risosrsa)
- POST -> porto PER LA PRIMA VOLTA qualcosa nel magazzino ( crea una nuova risorsa )
- PUT -> vado nel magazzino, e modifico ciò che già c'è (modifica una riorsa per intero)
- PATCH -> vado nel magazzino, e modifico ciò che già c'è (modifica una parte della riorsa)
- DELETE -> vado nel magazzino e elimino tutto ciò che già esiste (cancella una risorsa)


event.preventDefault()
- è un comando javascript che inibisce il comportamento di default (nativo)

@auth @guest
- @auth gestisce il momento in cui l'utente è autenticato
- @guest gestisce il momento in cui l'utente è sloggato
- sotto al cofano sono dei semplici if/else

extends
- Attiva l'ereditarietà

implements
- aggiungi funzionalità a ciò che già la classe possiede, fa riferimento alle interfacce


Redirect
- Tutti i metodi non collegati a rotte di tipo get devono avere una return particolare, di tipo redirect verso una rotta di tipo get

Il codice con ? e : viene chiamato operatore ternario, non è altro che un if else


php artisan make:model NomeModello -mcr crea:
- Il modello
- La migrazione
- Il controller
- All'interno del controller tutti i metodi del crud che abbiamo visto

forelse
if($user->articles)
foreach($user->articles as $article)
    //do something
else
    //do something


On delete cascade
- Cancella una entità e tutto quello che le è collegato


Name dei form
- In un form i name servono affinchè il dato nella request abbia una chiave nel chiave valore che si forma ogni volta che spingiamo il tasto submit



type="checkbox" -> definisce la tipologia dell'input, in questo è una checkbox
name="tags_selected[]" -> definisce la chiave con cui il dato deve viaggiare nella request, in questo caso è un array perchè devo gestire e manipolare più dati, non uno solo
value="{{$tag->id}}"-> definisce il valore effettivo che devo manipolare
id="tag_selected_{{$tag->id}}" -> Serve ad identificare l'elemento all'interno del DOM, univocamente
                                           
@if (in_array($tag->id, $article->tags->pluck('id')->toArray())) checked @endif
la funzione in_array è una funzione php, che vuole due parametri, il primo è l'elemento da cercare, il secondo è l'insieme all'interno del quale cercare.
Nel nostro caso stiamo prendendo l'id del tag, che è quello che ci interessa, poi stiamo creando un array di id di tutti i tag collegati all'articolo, e all'interno di quest'ultimo andiamo propri a cercare l'id del tag che abbiamo inserito come primo parametro della funzione in_array

$article->tags->pluck('id')->toArray() -> questo codice recupera tutti i tag collegati all'articolo ($article->tags) , dell'informazione appena recuperata prende solo gli id, che è quello che ci interessa (pluck('id')), una volta fatto questo trasforma tutti in una array (toArray())

L'effetto del codice completo è quello di darmi un bel true se l'id del tag è presente nell'array di tutti gli id dei tag collegati alarticolo


@if (in_array($tag->id, $article->tags->pluck('id')->toArray())) checked @endif
l'effetto di tutto questo codice è inserire l'attributo checked



$tags->whereNotIn('id', $article->tags->pluck('id'))
whereNotIn è una funzione php che vuole due parametri il primo è il dato da cercare, il secondo è l'insieme in cui cercare. Il risultato di questa funzione è True se il dato da cercare non è nell'insieme, false se invece  è presente. E' lopposto di in_array


@foreach($tags->whereNotIn('id', $article->tags->pluck('id')) as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach

l'effetto di questo codice è proprio quello di mostrare solo ed esclusivamente tutti i tag che non sono collegati all'articolo