<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostCreate extends Component
{
    public $korisnik_id;
    public $odobren;
    public $kategorija_id;
    public $naziv;
    public $cena;
    public $godina;
    public $koriscenost;
    public $ispravnost;
    public $zamena;
    public $proizvodjac;
    public $opis;
    public $mesto;
    public $postanski_broj;
    public $kontakt;
    public $saglasnost;
    public $garantovanje_tacnosti;

    public function mount(){
        $this->korisnik_id = Auth::id();
        $this->odobren = 0;
    }


    protected $rules = [
        'odobren' => 'required',
        'korisnik_id' => 'required',
        'kategorija_id' => 'required',
        'naziv' => 'required|min:10|max:70',
        'cena' => 'required',
        'godina' => 'required',
        'koriscenost' => 'required',
        'ispravnost' => 'required',
        'zamena' => 'required',
        'proizvodjac' => 'max:25',
        'opis' => 'required|min:25|max:255',
        'mesto' => 'required',
        'postanski_broj' => 'required',
        'kontakt' => 'required',
        'saglasnost' => 'required',
        'garantovanje_tacnosti' => 'required',
    ];

    public function store(){

        $this->validate();

        $post = new Post;
        $post->slug = Str::slug($this->naziv);
        $post->korisnik_id = $this->korisnik_id;
        $post->kategorija_id = $this->kategorija_id;
        $post->odobren = $this->odobren;
        $post->naziv = $this->naziv;
        $post->cena = $this->cena;
        $post->godina = $this->godina;
        $post->koriscenost = $this->koriscenost;
        $post->ispravnost = $this->ispravnost;
        $post->zamena = $this->zamena;
        $post->proizvodjac = $this->proizvodjac;
        $post->opis = $this->opis;
        $post->mesto = $this->mesto;
        $post->postanski_broj = $this->postanski_broj;
        $post->kontakt = $this->kontakt;
        $post->saglasnost = $this->saglasnost;
        $post->garantovanje_tacnosti = $this->garantovanje_tacnosti;
        $post->save();

        if($this->validate()){
            $this->emit('saveImages', $post->id, Auth::id());
        }


    }

    public function render()
    {
        return view('livewire.post-create');
    }
}
