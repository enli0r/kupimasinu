<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class PostsIndex extends Component
{
    use WithPagination;


    public function render()
    {
        $posts = Post::paginate(5); 


        return view('livewire.posts-index', [
            'posts' => $posts,
        ]);
    }
}
