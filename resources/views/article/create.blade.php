<x-layout>

    <div class="container-fluid p-5 bg-info">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1 class="display-1">
                    Inserisci un Articolo
                </h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- form --}}
                <form class="p-5 border rounded shadow-sm" method="POST" action="{{ route('article.store') }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo dell'articolo</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="body">Corpo del testo</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-info">Inserisci articolo</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>