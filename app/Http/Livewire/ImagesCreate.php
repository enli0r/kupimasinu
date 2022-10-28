<?php

namespace App\Http\Livewire;

use App\Models\PostImages;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImagesCreate extends Component
{
    use WithFileUploads;

    public $images = [];

    protected $listeners = ['saveImages'];

    protected $rules = ['images' => 'required'];

    public function saveImages($post_id, $user_id){
        if($this->validate()){
            foreach($this->images as $image){
                $newName = $user_id.'-'.$post_id.'-'.$image->getClientOriginalName();
                $image->storeAs('post-images', $newName);

                $postImage = new PostImages();
                $postImage->post_id = $post_id;
                $postImage->link = $newName;
                $postImage->save();

            }
        }
        
    }


    public function render()
    {
        return view('livewire.images-create');
    }
}
