<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = "patient_symptoms_form";
    protected $fillable = [
        'patient_id', 'diagnoses', 'past_medical_history', 'chest_pain', 'tightness', 'pulpitations', 'shortness_of_breath', 'orthopnea', 'pnd', 'swelling_of_ankles', 'coughing', 'wheezing', 'sputum', 'dizziness', 'presyncope', 'tiredness', 'exercise', 'other_symptoms', 'central_nervous_system', 'musculoskeletal', 'gastrointestinal', 'urogenital_symptoms', 'skin', 'gynae', 'medications', 'drug_allergies', 'updates', 'risk_factors_a', 'risk_factors_b', 'risk_factors_c', 'family_history', 'interventions', 'new_tests', 'status'
    ];
}
