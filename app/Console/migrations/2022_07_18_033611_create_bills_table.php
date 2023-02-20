<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_no')->unique();
            $table->unsignedInteger('patient_id');
            $table->json('all_test')->nullable();
            $table->string('net_price')->nullable();
            $table->string('discount')->nullable();
            $table->string('total_price')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('due_amount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('approved_code')->nullable();
            $table->string('barcode')->nullable();
            $table->string('employee_name')->nullable();

            $table->foreign('patient_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('bills');
    }
}
