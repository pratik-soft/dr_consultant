<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id');
            $table->text('blood_sample')->comment('Please write about your blood sample report');
            $table->text('ecg')->comment('Please write ECG findings');
            $table->text('echocardiogram')->comment('Please write Echo findings');
            $table->text('cmr')->comment('Cardiac magnetic resonance');
            $table->text('holt')->comment('Holt assessment');
            $table->text('pacemaker')->comment('write about pacemaker');
            $table->text('ett')->comment('Exercise tolerance test');
            $table->text('computed_tomography')->comment('Computed tomography');
            $table->text('other')->comment('write about any other findings');
            $table->text('on_examination')->comment('On examination');
            $table->text('blood_pressure')->comment('Blood pressure report');
            $table->text('heart_rate')->comment('Heart rate');
            $table->text('weight')->comment('Weight in pounds');
            $table->text('plans')->comment('write plan');
            $table->text('nota_bene')->comment('Note well');
            $table->text('ask_about')->comment('write specifics');
            $table->text('main_diagnosis')->comment('CMR MVO2 Holter 24/7d Stress Echo Bloods');
            $table->text('md_tests')->comment('MD tests');
            $table->text('md_treatment')->comment('Dose uptitration, SGLT2, Entresto');
            $table->text('risk_strat')->comment('Fab 4: Fluids/ Wt/ BB/ Salt');
            $table->text('driving_dvla')->comment('Device or arrythmia risk issues, Driving and DVLA');
            $table->text('anticoagulation')->comment('Anticoagulation');
            $table->text('has_bled_score')->comment('HAS BLED SCORE lansoprazole');
            $table->text('icd')->comment('ICD');
            $table->text('discharge')->comment('Pacemaker discharge');
            $table->dateTime('date_of_next_follow_up')->comment('Pacemaker Date of next follow up');
            $table->text('genetics')->comment('Refer to Tessa/Sam');
            $table->text('bp_recorder')->comment('Blood pressure recorder');
            $table->text('lipid')->comment('mention about lipid');
            $table->text('family_screening')->comment('Family screening');
            $table->text('chase')->comment('chase');
            $table->text('diagnosis_other')->comment('mention other diagnosis');
            $table->text('covid')->comment('COVID Advice given');
            $table->text('dental_check')->comment('Dentist appointment');
            $table->text('exercise')->comment('Lifestyle Do you exercise');
            $table->text('alcohol_smoking')->comment('Lifestyle Alcohol and smoking');
            $table->text('dtf')->comment('Lifestyle DTF');
            $table->text('dt')->comment('Lifestyle Dt');
            $table->text('stop_ace_arb')->comment('Pregnancy Stop ACE/ARB');
            $table->text('stop_meds')->comment('Pregnancy Stop meds');
            $table->text('ocp_card_preg_service')->comment('Pregnancy OCP/Card preg service');
            $table->text('cmuk')->comment('Patient education CMUK');
            $table->text('bhf')->comment('Patient education BHF');
            $table->text('red_flags')->comment('Symptoms to prompt expedited follow up inc');
            $table->text('follow_up_mention')->comment('Follow up plan + next steps arrange');
            $table->text('call_after_tests')->comment('Follow up plan + next steps Call after tests');
            $table->text('time_of_follow_up')->comment('Follow up plan + next steps Time of follow up');
            $table->text('follow_up_mdt')->comment('Follow up plan + next steps For MDT');
            $table->text('follow_up_cc')->comment('Follow up plan + next steps CC');
            $table->text('follow_up_red_flags')->comment('Follow up plan + next steps For red flags list');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_forms');
    }
};
