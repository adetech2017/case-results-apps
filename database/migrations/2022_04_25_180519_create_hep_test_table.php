<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHepTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hep_test', function (Blueprint $table) {
            $table->id();
            $table->text('patient_name');
            $table->text('patient_sex');
            $table->text('patient_age');
            $table->text('patient_dob');
            $table->text('patient_email');
            $table->text('sample_collection_date');
            $table->text('date_received');
            $table->text('sample_collection_time');
            $table->text('date_reported');
            $table->text('ordering');
            $table->text('referring');
            $table->text('patient_id');
            $table->text('result');
            $table->text('reference');
            $table->text('interpretation');
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
        Schema::dropIfExists('hep_test');
    }
}
