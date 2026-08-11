<?php

use Livewire\Component;

new class extends Component
{
    public $counter = 0;

    public function increase(){
        $this->counter++;
    }

    public function decrease(){
    $this->counter--;
    }

    public function incrementByNumber(Int $number){
        $this->counter += $number;
    }
};
?>

<div>
    <div class="display-4 text-center mb-3">{{ $counter }}</div>
    <div class="d-flex justify-content-center gap-2">
        <button class="btn btn-primary" wire:click="increase">Incrementa</button>
        <button class="btn btn-danger" wire:click="decrease">Diminuisci</button>
        <button class="btn btn-success" wire:click="incrementByNumber(5)">Incrementa di 5</button>
    </div>
</div>