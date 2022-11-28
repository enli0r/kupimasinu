<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function posts(){
        return $this->hasMany(Post::class, 'kategorija_id');
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function markedUsers(){
        return $this->belongsToMany(User::class, 'marked_categories', 'kategorija_id', 'korisnik_id');
    }
}
