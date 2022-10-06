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
        Schema::table('users', function (Blueprint $table) {
            $table->string('device_uuid',500)->after('status')->default('');
            $table->string('device_name',500)->after('device_uuid')->default('');
            $table->string('device_token',500)->after('device_name')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('device_uuid');
            $table->dropColumn('device_name');
            $table->dropColumn('device_token');
        });
    }
};
