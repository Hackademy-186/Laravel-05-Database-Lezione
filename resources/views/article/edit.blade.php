<x-layout>

    <div class="container-fluid p-5 bg-info">
        <div class="row justify-content-center">
            <div class="col-12 text-center text-white">
                <h1 class="display-1">
                    Modifica l'articolo {{$article->title}}
                </h1>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- form --}}
                <form class="p-5 border rounded shadow-sm" method="POST" action="{{route('article.update', $article)}}" enctype="multipart/form-data">

                    @csrf

                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo dell'articolo</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{$article->title}}">
                        @error('title')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle"  value="{{$article->subtitle}}">
                        @error('subtitle')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover" class="form-label">Copertina presente:</label>
                        {{-- se l'immagine di copertina presente nel db non è null allora mostramela --}}
                        @if($article->image)
                            <img src="{{Storage::url($article->image)}}" alt="{{$article->title}}">
                        @else
                        {{-- altrimenti mostrami l'immagine di default --}}
                            <img src="/default/default.jpg" alt="Immagine di default" width="300" height="300">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="cover" class="form-label">Copertina</label>
                        <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="cover" >
                        @error('cover')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="body">Corpo del testo</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10" >{{$article->body}}</textarea>
                        @error('body')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- CHECKBOX DEI TAG ESISTENTI --}}
                    <div class="mb-3">
                        <label for="tagcheck">Tag collegati:</label>
                        <div>
                            @foreach($article->tags as $tag)
                                <div class="form-check">
                                    <input type="checkbox"
                                            name="tags_selected[]"
                                            value="{{$tag->id}}"
                                            id="tag_selected_{{$tag->id}}"
                                            class="form-check-input"
                                            @if (in_array($tag->id, $article->tags->pluck('id')->toArray())) checked @endif
                                            >
                                    <label for="tag_selected_{{$tag->id}}" class="form-check-label">
                                        {{$tag->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    {{-- <div class="mb-3">
                        <label for="tagcheck">Tag collegati:</label>
                        <div>
                            @foreach($tags as $tag)
                                <div class="form-check">
                                    <input type="checkbox"
                                            name="tags_selected[]"
                                            value="{{$tag->id}}"
                                            id="tag_selected_{{$tag->id}}"
                                            class="form-check-input"
                                            @if (in_array($tag->id, $article->tags->pluck('id')->toArray())) checked @endif
                                            >
                                    <label for="tag_selected_{{$tag->id}}" class="form-check-label">
                                        {{$tag->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}

                    <div class="mb-3">
                        <label for="inputTag" class="form-label">Aggiungi nuovi tag:</label>
                        <select name="tag_new[]" multiple id="inputTag" class="form-control">
                            {{-- Non considerare i tag che hanno gli id presenti nella collezione dei tag collegati al prodotto --}}
                            @foreach($tags->whereNotIn('id', $article->tags->pluck('id')) as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-info">Modifica articolo</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>