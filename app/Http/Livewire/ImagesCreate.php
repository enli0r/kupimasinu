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
    public $removeTempList = [];
    public $imagesToUpload = [];

    protected $listeners = ['saveImages'];

    protected $rules = ['images' => 'required'];


    public function removeTemp($tempName){
        array_push($this->removeTempList, $tempName);
    }

    public function saveImages($post_id, $user_id){
        if($this->validate()){
            foreach($this->images as $image){
                if(!(in_array($image->getFilename(), $this->removeTempList))){
                    $newName = $user_id.'-'.$post_id.'-'.$image->getClientOriginalName();
                    $image->storeAs('post-images', $newName);
    
                    $postImage = new PostImages();
                    $postImage->post_id = $post_id;
                    $postImage->link = $newName;
                    $postImage->save();
                }
            }
        }

        foreach($this->images as $image){
            unlink(public_path('app/livewire-tmp/'.$image->getFilename()));
        }
    }


    public function render()
    {
        foreach($this->images as $image){
            array_push($this->imagesToUpload, $image);
        }



        return view('livewire.images-create');
    }
}
