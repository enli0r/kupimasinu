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

    public function forgotPassword(){
        return view('auth.forgot-password');
    }
}
