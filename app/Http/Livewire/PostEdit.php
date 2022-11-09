<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Naselja;
use Livewire\Component;
use App\Models\PostImages;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostEdit extends Component
{
    use WithFileUploads;

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
    public $kontakt;
    public $saglasnost;
    public $garantovanje_tacnosti;
    public $hiddenImages = [];

    //post_images
    public $post_images = [];
    public $imgRemoveList = [];

    //images
    public $images = [];
    public $imagesToUpload = [];
    public $imageNames = [];

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
        $this->kontakt = $post->kontakt;

        $this->post_images = $post->images;
    }


    //Images control
    public function postImageRemove($name){
        array_push($this->imgRemoveList, $name);
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
    //End of Images Control

    public function updateMesto($naziv){
        $this->mesto = $naziv;
    }

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
        'kontakt' => 'required',
        'saglasnost' => 'required',
        'garantovanje_tacnosti' => 'required',
        'hiddenImages' => 'required',
    ];

    public function editPost(){

        foreach($this->imagesToUpload as $img){
            array_push($this->hiddenImages, $img->getClientOriginalName());
        }

        foreach($this->post_images as $img){
            if(!(in_array($img->link, $this->imgRemoveList))){
                array_push($this->hiddenImages, $img->link);
            }
        }



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
            $this->post->kontakt = $this->kontakt;
            $this->post->saglasnost = $this->saglasnost;
            $this->post->garantovanje_tacnosti = $this->garantovanje_tacnosti;


        }

        if(count($this->post_images) > 0 || count($this->imagesToUpload) > 0){
            foreach($this->imagesToUpload as $image){
                $newName = auth()->user()->id.'-'.$this->post->id.'-'.$image->getClientOriginalName();
                $image->storeAs('post-images', $newName);

                $postImage = new PostImages();
                $postImage->post_id = $this->post->id;
                $postImage->link = $newName;
                $postImage->save();
            } 
            
            foreach($this->post_images as $image){
                if(in_array($image->link, $this->imgRemoveList)){
                    Storage::delete('app/post-images/'.$image->link);
                    PostImages::where('link', $image->link)->delete();
                }
            }
        }

        return redirect('/');
    }


    public function render()
    {
        if(count($this->imagesToUpload) > 0){
            foreach($this->images as $img){
                if(!(in_array($img->getClientOriginalName(), $this->imageNames))){
                    array_push($this->imagesToUpload, $img);
                }
            }
        }
        
        if(count($this->imagesToUpload) == 0){
            foreach($this->images as $img){
                array_push($this->imagesToUpload, $img);
            }
        }

        foreach($this->imagesToUpload as $imgToUpload){
            if(!(in_array($imgToUpload->getClientOriginalName(), $this->imageNames))){
                array_push($this->imageNames, $imgToUpload->getClientOriginalName());
            }
        }


        return view('livewire.post-edit', [
            'naselja' => Naselja::when(strlen($this->mesto) >= 2, function($query){
                return $query->where('naziv', 'like', '%'.$this->mesto.'%');
            })->get()
        ]);
    }
}
