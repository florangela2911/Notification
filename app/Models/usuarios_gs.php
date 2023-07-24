<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuarios_gs extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'historia',
        'fechacita',
        'hora',
        'nombre',
        'procedim',
        'sede',
        'direccion',
        'gmail'
    ];

    protected $guarded = [];
}    

    