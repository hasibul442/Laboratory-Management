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
        Schema::create('employee_info', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_phone_number')->nullable();
            $table->string('present_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->date('hire_date')->nullable();
            $table->date('resign_date')->nullable();
            $table->decimal('salary', 8, 2);
            $table->string('profile_picture')->nullable();
            $table->string('nid_image')->nullable();
            $table->string('acceptance_letter')->nullable();
            $table->string('cv')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();

            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('lab_branchs')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_info');
    }
};
