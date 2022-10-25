<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostsIndex extends Component
{
    use WithPagination;

    //Search
    public $search;
    //End of search

    //Filters
    public $tip;
    //Models
    public $cena_od;
    public $cena_do;
    public $godina_od;
    public $godina_do;
    //end of models
    public $koriscenost;
    public $ispravnost;
    public $zamena;
    //End of filters

    //Sorting
    public $sort_by = 'created_at';
    public $sort_direction = 'desc';


    public $queryString = [
        'search', 'tip', 'cena_od', 'cena_do', 'godina_od', 'godina_do', 'koriscenost', 'ispravnost', 'zamena'
    ];

    public $listeners = ['updatingTip', 'updatingKoriscenost', 'updatingIspravnost', 'updatingZamena'];


    public function setTip($tip){
        $this->tip = $tip;
        $this->resetPage();
    }
    public function setKoriscenost($koriscenost){
        $this->koriscenost = $koriscenost;
        $this->resetPage();
    }
    public function setIspravnost($ispravnost){
        $this->ispravnost = $ispravnost;
        $this->resetPage();
    }
    public function setZamena($zamena){
        $this->zamena = $zamena;
        $this->resetPage();
    }

    public function setOrderBy($sort_by, $sort_direction){
        $this->sort_by = $sort_by;
        $this->sort_direction = $sort_direction;
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
            ->when(strlen($this->search) >= 2, function($query){
                return $query->where('naziv', 'like', '%'.$this->search.'%');
            })
            ->when($this->cena_od != null, function($query){
                return $query->where('cena', '>=', $this->cena_od);
            })
            ->when($this->cena_do != null, function($query){
                return $query->where('cena', '<=', $this->cena_do);
            })
            ->when($this->godina_od != null, function($query){
                return $query->where('godina', '>=', $this->godina_od);
            })
            ->when($this->godina_do != null, function($query){
                return $query->where('godina', '<=', $this->godina_do);
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate(5),

            'sort_by' => $this->sort_by,
            'sort_direction' => $this->sort_direction

        ]);
    }
}
