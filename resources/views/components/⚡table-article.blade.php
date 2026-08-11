<?php
use Livewire\Component;
use App\Models\Product;
new class extends Component
{
    public $products;

    public function mount($products)
    {
        $this->products = $products;
    }

    public function destroy($id){
        Product::destroy($id);
    }
};
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Prodotti</h3>
        <a href="{{ route('create') }}" class="btn btn-primary btn-sm">+ Nuovo prodotto</a>
    </div>

    @if ($products->isEmpty())
        <p class="text-muted">Nessun prodotto ancora. <a href="{{ route('create') }}">Creane uno</a>.</p>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Immagine</th>
                        <th>Nome</th>
                        <th>Descrizione</th>
                        <th>Prezzo</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr wire:key="{{ $product->id }}">
                            <td><img src="{{ Storage::url($product->img) }}" alt="{{ $product->name }}" class="rounded" style="width: 56px; height: 56px; object-fit: cover;"></td>
                            <td>{{ $product->name }}</td>
                            <td class="text-muted">{{ Str::limit($product->description, 60) }}</td>
                            <td>&euro; {{ number_format($product->price, 2) }}</td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('show', $product) }}" class="btn btn-sm btn-outline-primary">Mostra</a>
                                    <a href="{{ route('edit', $product) }}" class="btn btn-sm btn-outline-warning">Modifica</a>
                                    <form wire:submit="destroy({{ $product->id }})" class="d-inline">
                                        <button class="btn btn-sm btn-outline-danger" type="submit" wire:confirm="Eliminare questo prodotto?">Elimina</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
