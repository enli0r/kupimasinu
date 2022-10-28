<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostEdit extends Component
{
    public $post;

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

    protected $rules = [
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

    public function editPost(){
        if($this->validate()){
            $this->post->odobren = $this->odobren;
            $this->post->kategorija_id = $this->kategorija_id;
            $this->post->naziv = $this->naziv;
            $this->post->cena = $this->cena;
            $this->post->godina = $this->godina;
            $this->post->koriscenost = $this->koriscenost;
            $this->post->ispravnost = $this->ispravnost;
            $this->post->zamena = $this->zamena;
            $this->post->proizvodjac = $this->proizvodjac;
            $this->post->opis = $this->opis;
            $this->post->mesto = $this->mesto;
            $this->post->postanski_broj = $this->postanski_broj;
            $this->post->kontakt = $this->kontakt;
            $this->post->saglasnost = $this->saglasnost;
            $this->post->garantovanje_tacnosti = $this->garantovanje_tacnosti;

            $this->emit('editImages');
        }
        
    }


    public function mount(Post $post){
        $this->post = $post;
        $this->odobren = 0;
        $this->kategorija_id = $post->kategorija_id;
        $this->naziv = $post->naziv;
        $this->cena = $post->cena;
        $this->godina = $post->godina;
        $this->koriscenost = $post->koriscenost;
        $this->ispravnost = $post->ispravnost;
        $this->zamena = $post->zamena;
        $this->proizvodjac = $post->proizvodjac;
        $this->opis = $post->opis;
        $this->mesto = $post->mesto;
        $this->postanski_broj = $post->postanski_broj;
        $this->kontakt = $post->kontakt;
    }


    public function render()
    {
        return view('livewire.post-edit');
    }
}
