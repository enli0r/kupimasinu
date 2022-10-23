<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostsToApprove extends Component
{
    use WithPagination;

    public $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        
        return view('livewire.posts-to-approve', [
            'posts' => Post::where('odobren', false)->paginate(5)
        ]);
    }
}
