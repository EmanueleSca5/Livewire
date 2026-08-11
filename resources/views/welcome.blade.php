<x-layout>

    <header class="container-fluid">
        <div class="row vh-100 bg-black">
            <div class="d-flex flex-column justify-content-center align-items-center col-12">
                <h1 class="fs-1 text-white">Gestione Prodotti</h1>
                <p class="text-white-50">Crea, modifica e organizza il tuo catalogo.</p>
            </div>
        </div>
    </header>

    <section class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h3 class="text-center mb-4">Counter</h3>
            </div>
            <div class="col-8 d-flex justify-content-center">
                <livewire:counter></livewire:counter>
            </div>
        </div>
    </section>

    @if (session("success"))
        <div class="container">
            <div class="alert alert-success">{{ session("success") }}</div>
        </div>
    @endif

    <section class="container pb-5">
        <div class="row justify-content-center g-4">
            <div class="col-md-5">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Visualizza prodotti</h5>
                        <p class="card-text text-muted flex-grow-1">Consulta l'elenco completo dei prodotti nel catalogo.</p>
                        <a href="{{ route('index') }}" class="btn btn-primary">Vai all'elenco</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card h-100 shadow-sm text-center">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Crea prodotto</h5>
                        <p class="card-text text-muted flex-grow-1">Aggiungi un nuovo prodotto al catalogo.</p>
                        <a href="{{ route('create') }}" class="btn btn-primary">Crea prodotto</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
