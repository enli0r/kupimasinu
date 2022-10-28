<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostImages;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImagesEdit extends Component
{
    use WithFileUploads;

    public $post;
    public $images = [];
    public $tempImageNames = array();
    public $postImages;
    public $postImagesToRemove;

    protected $listeners = ['editImages'];

    protected $rules = ['images.*' => 'image|mimes:jpeg,jpg,png,svg,gif'];

    public function mount(Post $post){
        $this->post = $post;
        $this->postImages = $post->images;
        $this->postImagesToRemove = array();
    }

    public function removeTempImage($name){
        unlink(storage_path('app/livewire-tmp/'.$name));

        array_push($this->tempImageNames, $name);
    }

    public function removePostImage(PostImages $postImage){
        array_push($this->postImagesToRemove, $postImage->link);
    }

    public function editImages(){

        if(!(count($this->postImagesToRemove) >= count($this->postImages) && $this->images == null)){

            //If there are new images to upload 
            if(count($this->images) > 0 ){

                if($this->validate()){
                    foreach($this->images as $image){

                        //Condition to not upload removed temp images
                        if(in_array($image->getFilename(), $this->tempImageNames) == false){
                            $user_id = auth()->user()->id;  
                            $newName = $user_id.'-'.$this->post->id.'-'.$image->getClientOriginalName();
                            $image->storeAs('post-images', $newName);
            
                            $postImage = new PostImages();
                            $postImage->post_id = $this->post->id;
                            $postImage->link = $newName;
                            $postImage->save();
                        } 
                    }
                }
                
            }

            //Deleting images that were in original post but were removed
            foreach($this->postImagesToRemove as $imageToRemove){
                unlink(storage_path('app/post-images/'.$imageToRemove));
                PostImages::where('link', $imageToRemove)->where('post_id', $this->post->id)->delete();
            }
    
        }
        
    }

    public function render()
    {
        return view('livewire.images-edit', [
            'postImages' => $this->postImages,
            'postImagesToRemove' => $this->postImagesToRemove
        ]);
    }
}
