<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}">Blog HFT186</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
        </li>
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('article.create') }}">Inserisci un articolo</a>
          </li>
        @endauth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @auth
            {{-- richiedo a laravel di chiamare la classe che gestisce hli utenti autenticati, prende l'utente autenticato in quel momento e di questo mostrarmi il nome --}}
              Ciao {{Auth::user()->name}}
            @else
              Ciao, accedi!
            @endauth
          </a>
          <ul class="dropdown-menu">
          @guest
            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
          @else
            {{-- caro anchor quando ti cliccherò non dovrai cercare l'haref ma dovrai invece cercare un form con id "#form-logout" e cliccare il tasto attivando la funzione "submit()" --}}
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
            <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">
              @csrf
            </form>
            <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Profilo</a></li>
          @endguest
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>