<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectrolytesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrolytes', function (Blueprint $table) {
            $table->id();
            $table->text('patient_name');
            $table->text('patient_gender');
            $table->text('patient_age');
            $table->text('patient_phone');
            $table->text('patient_email');
            $table->text('lab_code');
            $table->text('collection_date');
            $table->text('collection_time');
            $table->text('result_date');
            $table->text('chlorides_result');
            $table->text('sodium_result');
            $table->text('potassium_result');
            $table->text('bicarbonate_result');
            $table->text('calcium');
            $table->text('patient_location');
            $table->text('test_type');
            $table->text('test_comments');
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
        Schema::dropIfExists('electrolytes');
    }
}
