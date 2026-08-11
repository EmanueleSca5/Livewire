<?php

use Livewire\Component;

new class extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
};
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <img src="{{ Storage::url($product->img) }}" class="card-img-top" alt="{{ $product->name }}" style="max-height: 320px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text fw-semibold">&euro; {{ number_format($product->price, 2) }}</p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('edit', $product) }}" class="btn btn-warning">Modifica</a>
                        <a href="{{ route('index') }}" class="btn btn-outline-secondary">Torna all'elenco</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
