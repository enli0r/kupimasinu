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
    public $hiddenImages = [];
    public $model;

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
        $this->model = $post->model;
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
        'naziv' => 'required|min:5|max:128',
        'cena' => 'required',
        'godina' => 'required',
        'koriscenost' => 'required',
        'ispravnost' => 'required',
        'zamena' => 'required',
        'proizvodjac' => 'max:30',
        'model' => 'max:30',
        'opis' => 'required|min:25|max:255',
        'mesto' => 'required',
        'kontakt' => 'required',
        'hiddenImages' => 'required',
        'images.*' => 'mimes:jpg,jpeg,png|max:4096'
    ];

    public function editPost(Post $post){

        foreach($this->imagesToUpload as $img){
            array_push($this->hiddenImages, $img->getClientOriginalName());
        }

        foreach($this->post_images as $img){
            if(!(in_array($img->link, $this->imgRemoveList))){
                array_push($this->hiddenImages, $img->link);
            }
        }


        if($this->validate()){
            $post->kategorija_id = $this->kategorija_id;
            $post->naziv = $this->naziv;
            $post->cena = $this->cena;
            $post->godina = $this->godina;
            $post->koriscenost = $this->koriscenost;
            $post->ispravnost = $this->ispravnost;
            $post->zamena = $this->zamena;
            $post->proizvodjac = $this->proizvodjac;
            $post->model = $this->model;
            $post->opis = $this->opis;
            $post->mesto = $this->mesto;
            $post->kontakt = $this->kontakt;
            $post->odobren = 0;
            $post->save();
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

        return redirect()->route('homepage')->with('message', 'Uspešno ste izmenili sadržaj Vašeg oglasa. Oglas čeka na odobravanje.');
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


        return view('livewire.post-edit', [
            'naselja' => Naselja::when(strlen($this->mesto) >= 2, function($query){
                return $query->where('naziv', 'like', '%'.$this->mesto.'%');
            })->get()
        ]);
    }
}
