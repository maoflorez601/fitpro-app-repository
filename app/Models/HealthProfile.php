<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthProfile extends Model
{
    use HasFactory;

    // protege los campos contra la excepcion de asignacion masiva (MassAssigmentException) 
    protected $fillable = [
        'pathology_group',
        'pathology',
        'hearth_rate',
        'systole',
        'diastole',
        'blood_oxygen',
        'blood_glucose',
    ]; 
}
