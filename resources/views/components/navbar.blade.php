<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="{{ route('home') }}">Gestione Prodotti</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">Prodotti</a>
        </li>
      </ul>
      <a href="{{ route('create') }}" class="btn btn-primary btn-sm">+ Nuovo prodotto</a>
    </div>
  </div>
</nav>
