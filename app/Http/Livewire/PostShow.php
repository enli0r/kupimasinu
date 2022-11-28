<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Mail\NoviPost;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PostShow extends Component
{
    public $post;

    public function mount(Post $post){
        $this->post = $post;
    }

    public function approvePost(){
        $this->post->odobren = 1;
        $this->post->save();

        //Slanje mailova ljudima kojima je oznacena ova kategorija
        $category = Category::find($this->post->kategorija_id);
        
        $this->emit('newPostMail', $category);
        return redirect()->route('admin', auth()->user()->id)->with('message', 'Oglas je uspešno odobren');
    }

    public function deletePost(){

        //Deleting images
        foreach($this->post->images as $img){
            Storage::delete('app/post-images/'.$img->link);
            $img->delete();
        }

        //Deleting post
        $this->post->delete();

        return redirect()->route('homepage')->with('message', 'Usešno ste uklonili oglas');

    }
    
    public function render()
    {
        return view('livewire.post-show');
    }
}
