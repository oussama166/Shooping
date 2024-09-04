<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commende extends Model
{
    use HasFactory;
    protected $table = 'commende';
    protected $fillable = [
        'id_client',
        'id_commende',
        'produits',
        'adresse',
        'ville',
        'prix_commende_total',
        'validite_payement',
    ];
}
