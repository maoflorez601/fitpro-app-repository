<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foods';

    // protege los campos contra la excepcion de asignacion masiva (MassAssigmentException)
    protected $fillable = ['name','category','protein','carbs','fat']; 
}
