<?php

namespace App\Http\Livewire;

use App\Mail\NoviPost;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class EmailSender extends Component
{
    protected $listeners = ['newPostMail'];

    public function newPostMail(Category $category){
        $users = $category->markedUsers;

        if(count($users) > 0){
            foreach($users as $user){
                Mail::to($user->email)->send(new NoviPost($category->naziv));
            }
        }
    }


    public function render()
    {
        return view('livewire.email-sender');
    }
}
