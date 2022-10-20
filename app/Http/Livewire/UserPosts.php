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

    public function render()
    {
        $user = User::find(Auth::id());

        return view('livewire.user-posts', [
            'posts' => $user->posts()->paginate(5)
        ]);
    }
}
