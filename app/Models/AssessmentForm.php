<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentForm extends Model
{
    use HasFactory;
    protected $table = "assessment_forms";
    protected $fillable = [
        'patient_id', 'blood_sample', 'ecg', 'echocardiogram', 'cmr', 'holt', 'pacemaker', 'ett', 'computed_tomography', 'other', 'on_examination', 'blood_pressure', 'heart_rate', 'weight', 'plans', 'nota_bene', 'ask_about', 'main_diagnosis', 'md_tests', 'md_treatment', 'risk_strat', 'driving_dvla', 'anticoagulation', 'has_bled_score', 'icd', 'discharge', 'date_of_next_follow_up', 'genetics', 'bp_recorder', 'lipid', 'family_screening', 'chase', 'diagnosis_other', 'covid', 'dental_check', 'exercise', 'alcohol_smoking', 'dtf', 'dt', 'stop_ace_arb', 'stop_meds', 'ocp_card_preg_service', 'cmuk', 'bhf', 'red_flags', 'follow_up_mention', 'call_after_tests', 'time_of_follow_up', 'follow_up_mdt', 'follow_up_cc', 'follow_up_red_flags', 'status'
    ];
}
