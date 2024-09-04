<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produit';
    protected $primaryKey = 'code';
    protected $fillable = ['nom','classe','details','prix','reduction','new_prix','quantité','photoprofil','photo'];
}
