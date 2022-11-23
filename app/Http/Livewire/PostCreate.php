<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Naselja;
use Livewire\Component;
use App\Models\PostImages;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PostCreate extends Component
{
    use WithFileUploads;

    //Images
    public $images = [];
    public $imagesToUpload = [];
    public $imageNames = [];
    //Images


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
    public $kontakt;
    public $saglasnost;
    public $garantovanje_tacnosti;

    public $queryString = [
        'mesto'
    ];

    public function updateMesto($naziv){
        $this->mesto = $naziv;
    }

    public function removeTemp($tempName){
        //Removing images from imagesToUpload
        foreach($this->imagesToUpload as $imgToUpload){
            if($imgToUpload->getClientOriginalName() == $tempName){
                $index = array_search($imgToUpload, $this->imagesToUpload);

                unset($this->imagesToUpload[$index]);

                $this->imagesToUpload = array_values($this->imagesToUpload);
            }
        }
        
        //Removing image from image names
        $index = array_search($tempName, $this->imageNames);
        unset($this->imageNames[$index]);
        $this->imageNames = array_values($this->imageNames);

        //Removing image from images
        foreach($this->images as $img){
            if($img->getClientOriginalName() == $tempName){
                $index = array_search($img, $this->images);

                unset($this->images[$index]);

                $this->images = array_values($this->images);
            }
        }
    }


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
        'kontakt' => 'required',
        'saglasnost' => 'required',
        'garantovanje_tacnosti' => 'required',
        
    ];

    public function updated($name)
    {
        $this->validateOnly($name, [
            'naziv' => 'required|min:10|max:70',
        ]);
    }

    public function store(){
        $this->validate();

        $post = new Post;
        $post->slug = Str::slug($this->naziv).strtotime("now");
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
        $post->kontakt = $this->kontakt;
        $post->saglasnost = $this->saglasnost;
        $post->garantovanje_tacnosti = $this->garantovanje_tacnosti;
        $post->save();


        //Images
        if($this->validate()){
            foreach($this->imagesToUpload as $image){
                $newName = auth()->user()->id.'-'.$post->id.'-'.$image->getClientOriginalName();
                $image->storeAs('post-images', $newName);

                $postImage = new PostImages();
                $postImage->post_id = $post->id;
                $postImage->link = $newName;
                $postImage->save();
                
            }
        }

        return redirect()->route('homepage')->with('message', 'Uspešno ste kreirali oglas');
    }

    public function render()
    {
        if(count($this->imagesToUpload) > 0){
            foreach($this->images as $img){
                if($img->getMimeType() == 'image/png' || $img->getMimeType() == 'image/jpg' || $img->getMimeType() == 'image/jpeg'){
                    if(!(in_array($img->getClientOriginalName(), $this->imageNames))){
                        array_push($this->imagesToUpload, $img);
                    }
                }
            }
        }
        
        if(count($this->imagesToUpload) == 0){
            foreach($this->images as $img){
                if($img->getMimeType() == 'image/png' || $img->getMimeType() == 'image/jpg' || $img->getMimeType() == 'image/jpeg'){
                    array_push($this->imagesToUpload, $img);
                }
            }
        }

        foreach($this->imagesToUpload as $imgToUpload){
            if(!(in_array($imgToUpload->getClientOriginalName(), $this->imageNames))){
                array_push($this->imageNames, $imgToUpload->getClientOriginalName());
            }
        }



        return view('livewire.post-create', [
            'naselja' => Naselja::when(strlen($this->mesto) >= 2, function($query){
                return $query->where('naziv', 'like', '%'.$this->mesto.'%');
            })->get()
        ]);
    }
}
