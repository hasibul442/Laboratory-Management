<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lab_branchs', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('branch_email_1')->nullable();
            $table->string('branch_email_2')->nullable();
            $table->string('branch_hot_line')->nullable();
            $table->string('branch_phone_number_1')->nullable();
            $table->string('branch_phone_number_2')->nullable();
            $table->string('branch_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_branchs');
    }
};
