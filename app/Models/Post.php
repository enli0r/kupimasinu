<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\PostImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'korisnik_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'kategorija_id');
    }

    public function images(){
        return $this->hasMany(PostImages::class);
    }
}
