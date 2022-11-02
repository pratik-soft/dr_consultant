<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSymptomsFormOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_symptoms_form_id', 'patient_symptoms_option'
    ];
}
