<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDummiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dummies', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();            
            $table->enum('difficulty', ['easy', 'hard'])->nullable();
            $table->timestamp('posted_at', $precision = 0)->nullable();
            $table->boolean('featured')->nullable();
            $table->tinyInteger('status')->comment('0=>Inactive, 1=>Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dummies');
    }
}
