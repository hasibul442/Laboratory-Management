<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXrayreportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testreport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('test_id')->nullable();

            $table->string('image')->nullable();
            $table->string('upload_by')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('xrayreport');
    }
}
