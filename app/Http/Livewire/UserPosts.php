<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class UserPosts extends Component
{
    use WithPagination;

    public $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.user-posts', [
            'posts' => $this->user->posts()->paginate(5)
        ]);
    }
}
