<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PravnoLice;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($request->userType == 'pravno lice'){
            $request->validate([
                'ime_pravnog_lica' => ['required', 'string', 'max:255'],
                'pib' => ['required', 'min:9', 'max:9', 'unique:pravna_lica,pib']
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($request->userType == 'pravno lice'){
            $pravnoLice = PravnoLice::create([
                'korisnik_id' => $user->id,
                'ime_pravnog_lica' => $request->ime_pravnog_lica,
                'pib' => $request->pib
            ]);
        }
        

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('homepage')->with('message', 'Uspešno ste se registrovali');
    }

    public function userPage($id){

        return view('pages.user', [
            'user' => User::find($id)
        ]);
    }

    public function adminPage($id){

        return view('pages.admin', [
            'user' => User::find($id)
        ]);
    }
}
