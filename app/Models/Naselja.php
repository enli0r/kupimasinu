<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Naselja extends Model
{
    use HasFactory;

    protected $fillable = ['naziv', 'maticni_broj'];
}
