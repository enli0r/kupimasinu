<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
    public $tip;
    public $koriscenost;
    public $ispravnost;
    public $zamena;
    public $cena_od = 0;
    public $cena_do;

    public function mount($tip, $koriscenost, $ispravnost, $zamena){
        $this->tip = $tip;
        $this->koriscenost = $koriscenost;
        $this->ispravnost = $ispravnost;
        $this->zamena = $zamena;
    }


    public function updateCenaOd($cena_od){
        $this->cena_od = $cena_od;
    }

    public function updateTip($tip){
        $this->emit('updateTip', $tip);
    }


    public function render()
    {
        return view('livewire.filters');
    }
}
