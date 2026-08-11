<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
new class extends Component
{
    use WithFileUploads;


    #[Validate("required|min:3" , message: ["name.required" => "Nome non valido", "name.min" => "Nome troppo corto"])]
    public $name;
    #[Validate("required|min:3" , message: ["description.required" => "Descrizione non valida", "description.min" => "Descrizione non valida"])]
    public $description;
    #[Validate("required", message: ["price.required" => "Prezzo non valido"])]
    public $price;
    #[Validate("required|min:3" , message: ["img.required" => "Immagine non valida", "img.min" => "Immagine non valida"])]
    public $img;
    
    public $product;

    public function mount(){
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->img = $this->product->img;

    }

    public function update(){
        $this->validate();

        if ($this->img instanceof TemporaryUploadedFile) {
            $imgPath = $this->img->store("img", "public");
        } else {
            $imgPath = $this->img;
        }

        $this->product->update([
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "img" => $imgPath,
        ]);


        session()->flash("success", "Prodotto aggiornato con successo!");

        $this->redirectRoute("home");
    }
};
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                <h3 class="text-center mb-4">Modifica Prodotto</h3>

                @if (session("success"))
                    <div class="alert alert-success">{{ session("success") }}</div>
                @endif

                <form wire:submit="update" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" wire:model="name" id="name" class="form-control">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea wire:model="description" id="description" class="form-control" rows="3"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="number" wire:model="price" id="price" class="form-control">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine</label>
                        @if ($product->img)
                            <div class="mb-2">
                                <img src="{{ Storage::url($product->img) }}" alt="{{ $product->name }}" style="max-width: 150px;">
                            </div>
                        @endif
                        <input type="file" wire:model="img" id="img" class="form-control">
                        @error('img')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Aggiorna</button>
                        <a href="{{ route('show', $product) }}" class="btn btn-outline-secondary">Annulla</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
