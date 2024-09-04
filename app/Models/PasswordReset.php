<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PasswordReset extends Authenticatable
{
    use HasFactory,Notifiable;
    
    protected $fillable = [
        'user_id',
        'reset_code',
    ];
}
