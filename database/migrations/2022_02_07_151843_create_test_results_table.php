<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->text('patient_name');
            $table->text('patient_sex');
            $table->text('patient_dob');
            $table->text('patient_phone');
            $table->text('patient_email');
            $table->text('patient_nationality');
            $table->text('patient_address');
            $table->text('nasopharyngeal');
            $table->text('oropharyngeal');
            $table->text('sputum');
            $table->text('blood');
            $table->text('other_samples');
            $table->text('lab_code');
            $table->text('result');
            $table->text('result_date');
            $table->text('sample_collection_date');
            $table->text('sample_collection_time');
            $table->text('passport_number');
            $table->string('patient_location');
            $table->string('document_number',25);
            $table->string('patient_type', 25);
            $table->dateTime('result_timer');
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
        Schema::dropIfExists('test_results');
    }
}
