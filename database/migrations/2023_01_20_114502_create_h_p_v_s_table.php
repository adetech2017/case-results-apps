<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHPVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('h_p_v_s', function (Blueprint $table) {
            $table->id();
            $table->text('patient_name');
            $table->text('patient_gender');
            $table->text('patient_dob');
            $table->text('patient_phone');
            $table->text('patient_email');
            $table->text('lab_code');
            $table->text('nationality');
            $table->text('collection_date');
            $table->text('result_date');
            $table->text('sample_source');
            $table->text('cervix');
            $table->text('patient_location');
            $table->text('test_type');
            $table->text('general_comment');
            $table->string('document_number', 15);
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
        Schema::dropIfExists('h_p_v_s');
    }
}
