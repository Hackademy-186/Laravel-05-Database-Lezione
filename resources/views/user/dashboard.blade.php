<x-layout>

    <div class="container-fluid p-5 bg-info">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1 class="display-1">
                    Profilo dell'utente {{$user->name}}
                </h1>
            </div>
        </div>
    </div>

    {{-- Info utente --}}
    <div class="card mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title">{{ $user->name }}</h4>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Registrato il:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="text-center">
                <a href="" onclick="event.preventDefault(); document.querySelector('#form-delete').submit()" class="btn btn-danger">Cancella iscrizione</a>
                <form action="{{route('user.delete')}}" method="POST" class="d-none" id="form-delete">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>

    {{-- Articoli dell'utente --}}
    <div class="row">
        <h3 class="mb-3">I miei articoli</h3>
        
        @forelse($user->articles as $article)
            <div class="col-md-4 d-flex mb-3">
                <div class="card w-100 h-100 d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($article->body, 100) }}</p>
                        <div class="mt-auto text-center">
                            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Dettaglio</a>
                            <a href="{{ route('article.edit', $article) }}" class="btn btn-warning">Modifica</a>
                            <a class="btn btn-danger"
                            onclick="event.preventDefault(); document.querySelector('#form-delete-{{$article->id}}').submit()">
                            Cancella
                            </a>
                            <form action="{{ route('article.delete' , $article) }}" method="POST" id="form-delete-{{$article->id}}" class="d-none">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Non hai articoli inseriti</p>
        @endforelse
    </div>

</x-layout>