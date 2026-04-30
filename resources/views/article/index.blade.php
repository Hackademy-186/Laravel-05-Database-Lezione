<x-layout>

    <div class="container-fluid p-5 bg-info">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1 class="display-1">
                    Tutti gli articoli
                </h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            @foreach($articles as $article)
                <div class="col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            @if($article->cover)
                                <img src="{{Storage::url($article->cover)}}" alt="{{ $article->title }}">
                            @else
                                <img src="/default/default.jpg" alt="{{$article->title}}" width="300px"> 
                            @endif
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $article->subtitle }}</h6>
                            <p class="card-text">{{ $article->body }}</p>
                            <a href="{{route('article.show', $article)}}" class="btn btn-primary">Dettaglio</a>
                            @auth
                                {{-- @if($article->user) --}}
                                    @if($article->user && Auth::user()->id == $article->user->id)
                                        <a href="{{route('article.edit', $article)}}" class="btn btn-warning">Modifica</a>
                                        <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.querySelector('#form-delete-{{$article->id}}').submit();">Cancella</a>
                                        <form action="{{route('article.delete', $article)}}" method="POST" id="form-delete-{{$article->id}}" class="d-none">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    @endif
                                {{-- @endif --}}
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>