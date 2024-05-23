<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // protege los campos contra la excepcion de asignacion masiva (MassAssigmentException)
    protected $fillable = ['name','category','protein','carbs','fat']; 
}
