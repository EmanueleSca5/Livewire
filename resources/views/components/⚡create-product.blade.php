<?php

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    #[Validate("required|min:3" , message: ["name.required" => "Nome non valido", "name.min" => "Nome troppo corto"])]
    public $name;
    #[Validate("required|min:3" , message: ["description.required" => "Descrizione non valida", "description.min" => "Descrizione non valida"])]
    public $description;
    #[Validate("required|min:3" , message: ["price.required" => "Prezzo non valido", "price.min" => "Prezzo non valido"])]
    public $price;
    #[Validate("required|min:3" , message: ["img.required" => "Immagine non valida", "img.min" => "Immagine non valida"])]
    public $img;

    public function store(){

    $this->validate();

        if ($this->img !== null) {
    $imgPath = $this->img->store("img", "public");
        } else {
    $imgPath = "img/defaultimg.png";
        }

        Product::create([
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "img" => $imgPath,

        ]);

        $this->clearForm();
        // * $this->reset(); è un metodo gia compilato che fa la stessa cosa, ovvero svuota i campi degli attributi dove c è wire:model

    session()->flash("success" , "Prodotto aggiunto con successo!");

}

    protected function clearForm(){
        $this->name = "";
        $this->description = "";
        $this->price = "";
        $this->img = "";
    }
};
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center mb-4">Crea Prodotto</h3>

                    @if (session("success"))
                        <div class="alert alert-success">{{ session("success") }}</div>
                    @endif

                    <form enctype="multipart/form-data" wire:submit="store">

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
                            <input type="file" wire:model="img" id="img" class="form-control">
                            @error('img')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Salva</button>
                            <a href="{{ route('index') }}" class="btn btn-outline-secondary">Annulla</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
