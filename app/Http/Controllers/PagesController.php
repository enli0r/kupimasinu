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
        $post = Post::where('slug', $slug)->get();

        return view('pages.edit', [
            'post' => $post
        ]);
    }
}
