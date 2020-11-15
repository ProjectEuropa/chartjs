<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcrPositiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcr_positive', function (Blueprint $table) {
            $table->id();
            $table->integer('facility_id');
            $table->date('date');
            $table->integer('user_count');
            $table->integer('user_family_count');
            $table->integer('staff_count');
            $table->integer('staff_family_count');
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
        Schema::dropIfExists('pcr_positive');
    }
}
