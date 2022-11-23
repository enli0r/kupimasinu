<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use App\Models\Naselja;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPosts extends Component
{
    use WithPagination;

    public $user;

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
    public $mesto;
    //End of filters

    //Sorting
    public $sort_by = 'created_at';
    public $sort_direction = 'desc';

    public $queryString = ['search', 'tip', 'cena_od', 'cena_do', 'godina_od', 'godina_do', 'koriscenost', 'ispravnost', 'zamena'];

    


    public function mount(User $user){
        $this->user = $user;
    }


    public function updateTip($tip){
        if($this->tip == $tip){
            $this->tip = null;
        }else{
            $this->tip = $tip;
        }
    }

    public function updateKoriscenost($koriscenost){
        if($this->koriscenost == $koriscenost){
            $this->koriscenost = null;
        }else{
            $this->koriscenost = $koriscenost;
        }
    }

    public function updateIspravnost($ispravnost){
        if($this->ispravnost == $ispravnost){
            $this->ispravnost = null;
        }else{
            $this->ispravnost = $ispravnost;
        }

    }

    public function updateZamena($zamena){
        if($this->zamena == $zamena){
            $this->zamena = null;
        }else{
            $this->zamena = $zamena;
        }
    }

    public function updateMesto($mesto){
        if($this->mesto == $mesto){
            $this->mesto = null;
        }else{
            $this->mesto = $mesto;
        }
    }

    public function setOrderBy($sort_by, $sort_direction){
        $this->sort_by = $sort_by;
        $this->sort_direction = $sort_direction;
    }


    public function render()
    {
        $tipovi = collect([
            'masina za drvo' => 1,
            'masina za metal' => 2,
            'masina za plastiku' => 3,
            'radna masina' => 4
        ]);

        $koriscenosti = collect([
            'polovno' => 1,
            'novo' => 0
        ]);

        $ispravnosti = collect([
            'ispravno' => 1,
            'neispravno' => 0
        ]);

        $zamene = collect([
            'da' => 1,
            'ne' => 0
        ]); 

        return view('livewire.admin-posts', [
            'posts' => Post::where('odobren', 0)
            ->when($this->tip != null, function($query) use ($tipovi) {
                return $query->where('kategorija_id', $tipovi->get($this->tip));
            })
            ->when($this->mesto != null, function($query){
                return $query->where('mesto', $this->mesto);
            })
            ->when($this->koriscenost != null, function ($query) use ($koriscenosti) {
                return $query->where('koriscenost', $koriscenosti->get($this->koriscenost));
            })
            ->when($this->ispravnost != null, function ($query) use ($ispravnosti) {
                return $query->where('ispravnost', $ispravnosti->get($this->ispravnost));
            })
            ->when($this->zamena != null, function ($query) use ($zamene) {
                return $query->where('zamena', $zamene->get($this->zamena));
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
            'sort_direction' => $this->sort_direction,
            'tip' => $this->tip,
            'koriscenost' => $this->koriscenost,
            'ispravnost' => $this->ispravnost,
            'zamena' => $this->zamena,
            'naselja' => Naselja::all()
        ]);
    }
}
