<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('user_id');
            $table->string('patient_id')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('lmp')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('blood_group')->nullable();
            $table->longText('note')->nullable();
            $table->string('bp')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('referred_by')->nullable();
            $table->string('registerd_by')->nullable();
            $table->string('aprrovel_by')->nullable();

            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('patients');
    }
}
