<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widals', function (Blueprint $table) {
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
            $table->text('salmonella_paratyphi_a_o');
            $table->text('salmonella_paratyphi_b_o');
            $table->text('salmonella_paratyphi_c_o');
            $table->text('salmonella_paratyphi_a_h');
            $table->text('salmonella_paratyphi_b_h');
            $table->text('salmonella_paratyphi_c_h');
            $table->text('salmonella_typhi_h');
            $table->text('salmonella_typhi_o');
            $table->text('result');
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
        Schema::dropIfExists('widals');
    }
}
