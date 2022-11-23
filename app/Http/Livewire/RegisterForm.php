<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public $korisnik = 'fizicko lice';

    public $queryString = ['korisnik'];

    public function setUserType($korisnik){
        $this->korisnik = $korisnik;
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
