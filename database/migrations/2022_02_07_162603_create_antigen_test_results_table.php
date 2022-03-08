<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntigenTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antigen_test_results', function (Blueprint $table) {
            $table->id();
            $table->text('patient_name');
            $table->string('case_uid');
            $table->text('patient_sex');
            $table->text('patient_dob');
            $table->text('patient_phone');
            $table->text('patient_email');
            $table->text('patient_nationality');
            $table->text('passport_number');
            $table->text('lab_code');
            $table->text('collection_date');
            $table->text('collection_time');
            $table->text('result_date');
            $table->text('final_result');
            $table->text('sample_type');
            $table->string('patient_location');
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
        Schema::dropIfExists('antigen_test_results');
    }
}
