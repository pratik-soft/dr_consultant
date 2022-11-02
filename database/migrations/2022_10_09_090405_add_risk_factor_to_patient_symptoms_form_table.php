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
        Schema::table('patient_symptoms_form', function (Blueprint $table) {
            $table->string('risk_factors_a')->after('updates');
            $table->string('risk_factors_b')->after('risk_factors_a');
            $table->string('risk_factors_c')->after('risk_factors_b');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_symptoms_form', function (Blueprint $table) {
            $table->string('risk_factors_a');
            $table->string('risk_factors_b');
            $table->string('risk_factors_c');
        });
    }
};
