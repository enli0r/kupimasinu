<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ChangePassword extends Component
{
    public $user;
    public $old_pass;
    public $new_pass;
    public $new_pass_confirm;

    public function mount(User $user){
        $this->user = $user;
    }

    public $rules = [
        'old_pass' => 'required|min:8',
        'new_pass' => 'required|min:8',
        'new_pass_confirm' => 'required|string|min:8'
    ];



    public function changePassword(){
        $this->resetValidation();
        
        $validatedData = Validator::make(
            [
                'old_pass' => $this->old_pass,
                'new_pass' => $this->new_pass,
                'new_pass_confirm' => $this->new_pass_confirm,
            ],
            [
                'old_pass' => 'required|min:8',
                'new_pass' => 'required|min:8',
                'new_pass_confirm' => 'required|string|min:8'
            ],
            [
                'min' => 'Morate uneti barem 8 karaktera',
                'required' => 'Ovo polje je obavezno'
            ]
            
        )->validate();

        if (Hash::check($this->old_pass, $this->user->password)){
            if($this->new_pass === $this->new_pass_confirm){

                $this->user->password = Hash::make($this->new_pass);
                $this->user->save();

                return redirect()->route('user', $this->user);

            }else{
                $this->addError('new_pass_confirm', 'Šifre vam se ne podudaraju');
            }

        }else{
            $this->addError('old_pass', 'Uneli ste pogrešnu šifru');
        }
        
        
        
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
