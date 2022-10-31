<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filters extends Component
{
    public $tip;
    public $koriscenost;
    public $ispravnost;
    public $zamena;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tip, $koriscenost, $ispravnost, $zamena)
    {
        $this->tip = $tip;
        $this->koriscenost = $koriscenost;
        $this->ispravnost = $ispravnost;
        $this->zamena = $zamena;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filters', [
            
        ]);
    }
}
