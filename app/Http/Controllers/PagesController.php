<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function create(){
        return view('pages.create');
    }

    public function edit($slug){
        $post = Post::where('slug', $slug)->first();

        return view('pages.edit', [
            'post' => $post
        ]);
    }

    public function oNama(){
        return view('pages.o-nama');
    }

    public function usloviKoriscenja(){
        return view('pages.pravila-i-uslovi-koriscenja');
    }

    public function politikaPrivatnosti(){
        return view('pages.politika-privatnosti');
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }
}
