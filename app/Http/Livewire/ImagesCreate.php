<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PostImages;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class ImagesCreate extends Component
{
    use WithFileUploads;

    public $images = [];
    // public $removeTempList = [];
    public $imagesToUpload = [];
    public $imageNames = [];

    protected $listeners = ['saveImages'];

    protected $rules = ['images' => 'required'];


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


    public function saveImages($post_id, $user_id){
        if($this->validate()){
            foreach($this->imagesToUpload as $image){
                
                $newName = $user_id.'-'.$post_id.'-'.$image->getClientOriginalName();
                $image->storeAs('post-images', $newName);

                $postImage = new PostImages();
                $postImage->post_id = $post_id;
                $postImage->link = $newName;
                $postImage->save();
                
            }
        }

        foreach($this->images as $image){
            unlink(public_path('app/livewire-tmp/'.$image->temporaryUrl()));
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




        return view('livewire.images-create');
    }
}
