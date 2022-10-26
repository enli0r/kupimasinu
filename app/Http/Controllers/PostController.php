<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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


    // public function store(Request $request){

    //     $images = $request->images;

    //     if(count($images)){
    //         foreach($images as $image){
    //             $newImageName = time(). '-'. $image->getClientOriginalName();
    //             $image->move(public_path('temp-images'), $newImageName);
    //         }
    //     }
        

    //     $request->validate([
    //         'korisnik' => 'required',
    //         'kategorija' => 'required',
    //         'naziv' => 'required|max:75',
    //         'cena' => 'required|numeric',
    //         'godina' => 'required|numeric',
    //         'koriscenost' => 'required',
    //         'ispravnost' => 'required',
    //         'zamena' => 'required',
    //         'opis' => 'required|max:255',
    //         'mesto' => 'required',
    //         'postanski_broj' => 'required',
    //         'kontakt' => 'required|numeric',
    //         'saglasnost' => 'required',
    //         'tacnost' => 'required',
    //     ]);

    //     $post = new Post;
    //     $post->korisnik_id = $request->korisnik;
    //     $post->kategorija_id = $request->kategorija;

    //     $post->naziv = $request->naziv;
    //     $post->slug = $this->createSlug($request->naziv);
    //     $post->cena = $request->cena;
        
    //     $post->godina = $request->godina;
    //     $post->koriscenost = $request->koriscenost;

    //     $post->ispravnost = $request->ispravnost;
    //     $post->zamena = $request->zamena;

    //     $post->proizvodjac = $request->proizvodjac;
    //     $post->opis = $request->opis;

    //     $post->mesto = $request->mesto;
    //     $post->postanski_broj = $request->postanski_broj;

    //     $post->kontakt = $request->kontakt;
    //     $post->garantovanje_tacnosti = $request->tacnost;
    //     $post->saglasnost = $request->saglasnost;

    //     $post->odobren = $request->odobren;

    //     $post->save();

        
    //     foreach($images as $image){
    //         $newImageName = time(). '-'. $image->getClientOriginalName();

    //         $postImage = new PostImages;
    //         $postImage->post_id = $post->id;
    //         $postImage->link = $newImageName;
    //         $postImage->save();

    //         if(File::exists('temp-images/'.$newImageName) && PostImages::find($postImage->id)){
    //             $image->move(public_path('images'), $newImageName);
    //             File::delete('temp-images/'.$newImageName);
    //         }

    //     }



        

    //      return redirect('/oglasi');       
    // }


    // public function createSlug($naziv){
    //     $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $naziv); 
    //     $final_slug = preg_replace('/-+/', '-', $string); 
    //     $slug = strtolower($final_slug);

    //     return $slug;
    // }

    // public function update(Request $request, $slug){
    //     $request->validate([
    //         'korisnik' => 'required',
    //         'kategorija' => 'required',
    //         'naziv' => 'required|max:75',
    //         'cena' => 'required|numeric',
    //         'godina' => 'required|numeric',
    //         'koriscenost' => 'required',
    //         'ispravnost' => 'required',
    //         'zamena' => 'required',
    //         'opis' => 'required|max:255',
    //         'mesto' => 'required',
    //         'postanski_broj' => 'required',
    //         'kontakt' => 'required|numeric',
    //         'saglasnost' => 'required',
    //         'tacnost' => 'required',
    //         'images' => 'required'
    //     ]);

    //     $post = Post::where('slug', $slug)->first();
    //     $post->korisnik_id = $request->korisnik;
    //     $post->kategorija_id = $request->kategorija;

    //     $post->naziv = $request->naziv;
    //     $post->cena = $request->cena;
        
    //     $post->godina = $request->godina;
    //     $post->koriscenost = $request->koriscenost;

    //     $post->ispravnost = $request->ispravnost;
    //     $post->zamena = $request->zamena;

    //     $post->proizvodjac = $request->proizvodjac;
    //     $post->opis = $request->opis;

    //     $post->mesto = $request->mesto;
    //     $post->postanski_broj = $request->postanski_broj;

    //     $post->kontakt = $request->kontakt;
    //     $post->garantovanje_tacnosti = $request->tacnost;
    //     $post->saglasnost = $request->saglasnost;

    //     $post->odobren = $request->odobren;
    //     $post->save();

        
    //     $images = $request->images;

    //     foreach($images as $image){
    //         $newImageName = time(). '-'. $image->getClientOriginalName();
    //         $image->move(public_path('images'), $newImageName);

    //         $image = new PostImages;
    //         $image->post_id = $post->id;
    //         $image->link = $newImageName;
    //         $image->save();
    //     }
        

    //      return redirect('/');   
    // }

    // public function destroy($slug){
    //     $post = Post::where('slug', $slug)->first();
        
    //     $images = PostImages::where('post_id', $post->id)->get();

    //     foreach($images as $image){
    //         $image->delete();
    //     }

    //     $post->delete();

    //     return redirect('/');
    // }

}
