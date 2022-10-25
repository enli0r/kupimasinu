<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostsIndex extends Component
{
    use WithPagination;

    public $tip;
    public $cena_od;
    public $cena_do;
    public $godina_od;
    public $godina_do;
    public $koriscenost;
    public $ispravnost;
    public $zamena;

    public $queryString = [
        'tip', 'cena_od', 'cena_do', 'godina_od', 'godina_do', 'koriscenost', 'ispravnost', 'zamena'
    ];

    public $listeners = ['updatingTip', 'updatingKoriscenost', 'updatingIspravnost', 'updatingZamena'];


    public function updatingTip($tip){
        $this->tip = $tip;
    }
    public function updatingKoriscenost($koriscenost){
        $this->koriscenost = $koriscenost;
    }
    public function updatingIspravnost($ispravnost){
        $this->ispravnost = $ispravnost;
    }
    public function updatingZamena($zamena){
        $this->zamena = $zamena;
    }

    public function render()
    {
        $tipovi = collect([
            'masina za drvo' => 1,
            'masina za metal' => 2
        ]);

        $koriscenost = collect([
            'polovno' => 1,
            'novo' => 0
        ]);

        $ispravnost = collect([
            'ispravno' => 1,
            'neispravno' => 0
        ]);

        $zamena = collect([
            'da' => 1,
            'ne' => 0
        ]); 
                    


        return view('livewire.posts-index', [
            'posts' => Post::when($this->tip != null, function($query) use ($tipovi) {
                return $query->where('kategorija_id', $tipovi->get($this->tip));
            })
            ->when($this->koriscenost != null, function ($query) use ($koriscenost) {
                return $query->where('koriscenost', $koriscenost->get($this->koriscenost));
            })
            ->when($this->ispravnost != null, function ($query) use ($ispravnost) {
                return $query->where('ispravnost', $ispravnost->get($this->ispravnost));
            })
            ->when($this->zamena != null, function ($query) use ($zamena) {
                return $query->where('zamena', $zamena->get($this->zamena));
            })
            ->paginate(5)
        ]);
    }
}
