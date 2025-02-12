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
        Schema::create('patient_info', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('patient_id')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('status')->default(1);
            $table->string('profile_picture')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('referrer_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_info');
    }
};
