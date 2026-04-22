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