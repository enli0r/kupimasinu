<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PravnoLice extends Model
{
    use HasFactory;

    protected $table = 'pravna_lica';

    protected $fillable = ['korisnik_id', 'ime_pravnog_lica', 'pib'];

    public function user(){
        return $this->belongsTo(User::class, 'korisnik_id');
    }
}
