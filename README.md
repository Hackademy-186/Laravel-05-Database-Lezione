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