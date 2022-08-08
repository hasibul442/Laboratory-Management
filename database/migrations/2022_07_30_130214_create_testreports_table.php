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
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('test_id');

            $table->string('image')->nullable();
            $table->string('upload_by')->nullable();
            $table->string('status')->nullable();
            $table->longText('testresult')->nullable();
            $table->string('signeture')->nullable();
            $table->json('elementuse')->nullable();

            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('bills')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('labtest')->onDelete('cascade');
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
