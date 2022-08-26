<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitrixes', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('othername');
            $table->string('firstname');
            $table->string('title');
            $table->string('CMStatus');
            $table->string('dateofBirth');
            $table->string('gender');
            $table->string('mobilePhone');
            $table->string('email');
            $table->string('residence');
            $table->string('country');
            $table->string('state');
            $table->string('motherName');
            $table->string('nok');
            $table->string('nokPhone');
            $table->string('nin');
            $table->string('chn');
            $table->string('lga');
            $table->string('bankName');
            $table->string('bankAccount');
            $table->string('BVN');
            $table->string('Product');
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
        Schema::dropIfExists('bitrixes');
    }
}
