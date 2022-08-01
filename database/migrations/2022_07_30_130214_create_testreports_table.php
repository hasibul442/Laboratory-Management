<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testreports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('patient_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('test_id')->nullable();

            $table->string('image')->nullable();
            $table->string('upload_by')->nullable();
            $table->string('status')->nullable();
            $table->longText('testresult')->nullable();
            $table->string('signeture')->nullable();
            $table->json('elementuse')->nullable();
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
        Schema::dropIfExists('testreports');
    }
}
