<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregenacyTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregenacy_tests', function (Blueprint $table) {
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
            $table->text('final_result');
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
        Schema::dropIfExists('pregenacy_tests');
    }
}
