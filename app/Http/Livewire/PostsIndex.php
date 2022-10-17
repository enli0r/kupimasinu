<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    public function refresh(){
        dd('xd');
    }


    public function render()
    {
        $posts = Post::paginate(2); 

        return view('livewire.posts-index', [
            'posts' => $posts,
        ]);
    }
}
