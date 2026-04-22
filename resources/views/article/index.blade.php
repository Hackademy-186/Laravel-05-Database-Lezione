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
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>