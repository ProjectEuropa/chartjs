<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_records', function (Blueprint $table) {
            // $table->id();
            $table->date('ymd');
            $table->integer('facility_id');
            $table->integer('city_id');
            $table->integer('ward_id');
            $table->integer('user_count');
            $table->integer('staff_count');
            $table->integer('positive_user_count');
            $table->integer('positive_user_family_count');
            $table->integer('positive_staff_count');
            $table->integer('positive_staff_family_count');
            $table->integer('target_user_count');
            $table->integer('target_user_family_count');
            $table->integer('target_staff_count');
            $table->integer('target_staff_family_count');
            $table->integer('ppe_visit_count');
            $table->integer('ppe_used_count');
            $table->integer('answer_to_q1_1');
            $table->integer('answer_to_q1_2');
            $table->integer('answer_to_q1_3');
            $table->integer('answer_to_q1_4');
            $table->integer('answer_to_q1_5');
            $table->integer('answer_to_q2_1');
            $table->integer('answer_to_q2_2');
            $table->integer('answer_to_q2_3');
            $table->integer('answer_to_q2_4');
            $table->timestamps();
            
            $table->primary(['ymd', 'facility_id']);

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
        Schema::dropIfExists('input_records');
    }
}
