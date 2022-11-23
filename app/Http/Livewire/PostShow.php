<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class PostShow extends Component
{
    public $post;

    public function mount(Post $post){
        $this->post = $post;
    }

    public function deletePost(){

        //Deleting images
        foreach($this->post->images as $img){
            Storage::delete('app/post-images/'.$img->link);
            $img->delete();
        }

        //Deleting post
        $this->post->delete();

        return redirect()->route('homepage')->with('message', 'Usešno ste uklonili Vaš oglas');

    }
    
    public function render()
    {
        return view('livewire.post-show');
    }
}
