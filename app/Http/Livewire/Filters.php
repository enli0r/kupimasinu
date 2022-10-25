<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\PostsIndex;

class Filters extends Component
{
    public function setTip($tip){
        $this->emit('updatingTip', $tip);
    }

    public function setKoriscenost($koriscenost){
        $this->emit('updatingKoriscenost', $koriscenost);
    }

    public function setIspravnost($ispravnost){
        $this->emit('updatingIspravnost', $ispravnost);
    }

    public function setZamena($zamena){
        $this->emit('updatingZamena', $zamena);
    }

    public function render()
    {
        return view('livewire.filters');
    }
}
