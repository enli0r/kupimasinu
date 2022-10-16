<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function show($slug){

        $post = Post::where('slug', $slug)->first();

        return view('pages.show', [
            'post' => $post
        ]);
    }


}
