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

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                {{-- form --}}
                <form class="p-5 border rounded shadow-sm" method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo dell'articolo</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}">
                        @error('title')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle"  value="{{old('subtitle')}}">
                        @error('subtitle')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="30" rows="10" >{{old('body')}}</textarea>
                        @error('body')
                            <div class="p-0 small fst-italic text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-info">Inserisci articolo</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>